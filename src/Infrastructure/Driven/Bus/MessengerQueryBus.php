<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Bus;

use App\Application\Bus\QueryBus;
use App\Application\Query\Query;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Undabot\SymfonyJsonApi\Model\Collection\ArrayCollection;
use Undabot\SymfonyJsonApi\Model\Collection\ObjectCollection;

class MessengerQueryBus implements QueryBus
{
    use HandleTrait;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    /**
     * @throws \Throwable
     *
     * @return ObjectCollection The handler returned value
     */
    public function handleQuery(Query $query): ObjectCollection
    {
        try {
            $result = $this->handle($query);
        } catch (HandlerFailedException $ex) {
            throw $ex->getNestedExceptions()[0];
        }

        if (false === ($result instanceof ObjectCollection)) {
            $result = new ArrayCollection($result);
        }

        return $result;
    }
}
