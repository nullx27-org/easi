<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\KillmailsApi;


class Killmails extends Endpoint
{

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new KillmailsApi();
    }

    public function getLocation(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdLocationWithHttpInfo($characterId, $this->datasource);
    }

    public function getShip(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdShipWithHttpInfo($characterId, $this->datasource);
    }
}