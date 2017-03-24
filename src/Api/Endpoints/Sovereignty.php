<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\SovereigntyApi;


class Sovereignty extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new SovereigntyApi();
    }

    public function getCampaigns()
    {
        return $this->apiClient->getSovereigntyCampaignsWithHttpInfo($this->datasource);
    }

    public function getStructures()
    {
        return $this->apiClient->getSovereigntyStructuresWithHttpInfo($this->datasource);
    }

}