<?php

declare(strict_types=1);

namespace App\Infrastructure\Driving\Common\v1\Endpoint\Warehouse;

use App\Application\Bus\CommandBus;
use App\Application\Command\Warehouse\CreateProductCommand;
use App\Application\Repository\Warehouse\ProductReadRepository;
use App\Domain\Warehouse\VO\ProductColor;
use App\Domain\Warehouse\VO\ProductName;
use App\Infrastructure\Driving\Common\v1\ApiResponder\ResourceResponder;
use App\Infrastructure\Driving\Common\v1\Model\Warehouse\ProductWriteModel;
use Symfony\Component\Routing\Annotation\Route;
use Undabot\JsonApi\Definition\Model\Request\CreateResourceRequestInterface;
use Undabot\SymfonyJsonApi\Http\Model\Response\ResourceCreatedResponse;
use Undabot\SymfonyJsonApi\Http\Service\SimpleResourceHandler;

final class CreateProductController
{
    /** @Route("/common/v1/products", name="common.v1.product.create", methods={"POST"}) */
    public function create(
        ProductReadRepository $productReadRepository,
        ResourceResponder $responder,
        CreateResourceRequestInterface $request,
        SimpleResourceHandler $resourceHandler,
        CommandBus $commandBus,
    ): ResourceCreatedResponse {
        /** @var ProductWriteModel $productWriteModel */
        $productWriteModel = $resourceHandler->getModelFromRequest($request, ProductWriteModel::class);
        $id = $productReadRepository->nextId();
        $commandBus->handleCommand(new CreateProductCommand(
            $id,
            new ProductName($productWriteModel->name),
            new ProductColor($productWriteModel->color),
        ));

        return $responder->resourceCreated($productReadRepository->get($id));
    }
}
