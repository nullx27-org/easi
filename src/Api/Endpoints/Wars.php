<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\WarsApi;

class Wars extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new WarsApi();
    }

    public function getWars(int $maxWarId)
    {
        return $this->apiClient->getWarsWithHttpInfo($maxWarId, $this->datasource);
    }

    public function getWar(int $warId)
    {
        return $this->apiClient->getWarsWarIdWithHttpInfo($warId, $this->datasource);
    }

    public function getKillmails(int $warId, int $page = null)
    {
        return $this->apiClient->getWarsWarIdKillmailsWithHttpInfo($warId, $page, $this->datasource);
    }
}
