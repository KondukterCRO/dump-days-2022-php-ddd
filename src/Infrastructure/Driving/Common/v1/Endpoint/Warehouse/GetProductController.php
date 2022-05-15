<?php

declare(strict_types=1);

namespace App\Infrastructure\Driving\Common\v1\Endpoint\Warehouse;

use App\Application\Repository\Warehouse\ProductReadRepository;
use App\Domain\Warehouse\ProductId;
use App\Infrastructure\Driving\Common\v1\ApiResponder\ResourceResponder;
use Symfony\Component\Routing\Annotation\Route;
use Undabot\SymfonyJsonApi\Http\Model\Response\ResourceResponse;

final class GetProductController
{
    //{"jsonapi":{"version":"1.0"},"data":{
    //"type":"products",
    //"id":"01FR7ZF9RTHKSVH9FB1BA846JV",
    //"attributes":{"name":"hhhhhhhh","color":"LawnGreen"},
    //"relationships":{}}}
    /** @Route("/common/v1/products/{id}", name="common.v1.product.get", methods={"GET"}) */
    public function get(
        ProductId $id,
        ProductReadRepository $productReadRepository,
        ResourceResponder $resourceResponder,
    ): ResourceResponse {
        return $resourceResponder->resource($productReadRepository->get($id));
    }
}
