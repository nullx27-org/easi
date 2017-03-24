<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\InsuranceApi;


class Insurance extends Endpoint
{

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new InsuranceApi();
    }

    public function getPrices($language = null)
    {
        return $this->apiClient->getInsurancePricesWithHttpInfo($language, $this->datasource);
    }


}