<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\MarketApi;


class Market extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new MarketApi();
    }

    public function getPrices()
    {
        return $this->apiClient->getMarketsPricesWithHttpInfo($this->datasource);
    }

    public function getRegionHistory(int $regionId, int $typeId)
    {
        return $this->apiClient->getMarketsRegionIdHistoryWithHttpInfo($regionId, $typeId, $this->datasource);
    }

    public function getRegionOrders(int $regionId, string $orderType, int $typeId = null, int $page = 1)
    {
        return $this->apiClient->getMarketsRegionIdOrdersWithHttpInfo($regionId, $orderType, $typeId, $page, $this->datasource);
    }

    public function getStructureOrders(int $structureId, int $page = 1)
    {
        return $this->apiClient->getMarketsStructuresStructureIdWithHttpInfo($structureId, $page, $this->datasource);
    }

}