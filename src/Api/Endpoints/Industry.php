<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\IndustryApi;


class Industry extends Endpoint
{

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new IndustryApi();
    }

    public function getFacilities()
    {
        return $this->apiClient->getIndustryFacilitiesWithHttpInfo($this->datasource);
    }

    public function getSystems()
    {
        return $this->apiClient->getIndustrySystemsWithHttpInfo($this->datasource);
    }

}