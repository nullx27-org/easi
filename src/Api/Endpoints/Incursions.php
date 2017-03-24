<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\IncursionsApi;


class Incursions extends Endpoint
{

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new IncursionsApi();
    }

    public function getIncursions()
    {
        return $this->apiClient->getIncursionsWithHttpInfo($this->datasource);
    }
}