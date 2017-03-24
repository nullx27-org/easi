<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\ClonesApi;

class Clones extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new ClonesApi();
    }

    public function getClones(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdClonesWithHttpInfo($characterId, $this->datasource);
    }
}
