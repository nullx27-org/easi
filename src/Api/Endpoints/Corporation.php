<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\CorporationApi;

class Corporation extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new CorporationApi();
    }

    public function getCorporation(int $corporationId)
    {
        return $this->apiClient->getCorporationsCorporationIdWithHttpInfo($corporationId, $this->datasource);
    }

    public function getAllianceHistory(int $corporationId)
    {
        return $this->apiClient->getCorporationsCorporationIdAlliancehistoryWithHttpInfo($corporationId, $this->datasource);
    }

    public function getLogo(int $corporationId)
    {
        return $this->apiClient->getCorporationsCorporationIdIconsWithHttpInfo($corporationId, $this->datasource);
    }

    public function getMembers(int $corporationId)
    {
        return $this->apiClient->getCorporationsCorporationIdMembersWithHttpInfo($corporationId, $this->datasource);
    }

    public function getRoles(int $corporationId)
    {
        return $this->apiClient->getCorporationsCorporationIdRolesWithHttpInfo($corporationId, $this->datasource);
    }

    public function getCorporationsNames(array $corporationIds)
    {
        return $this->apiClient->getCorporationsNamesWithHttpInfo($corporationIds, $this->datasource);
    }
}
