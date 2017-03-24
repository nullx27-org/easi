<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\Easi\Api\Models\Fitting;
use nullx27\ESI\Api\FittingsApi;

class Fittings extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new FittingsApi();
    }

    public function deleteFitting(int $characterId, int $fittingId)
    {
        return $this->apiClient->deleteCharactersCharacterIdFittingsFittingIdWithHttpInfo($characterId, $fittingId, $this->datasource);
    }

    public function getCharacterFitting(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdFittingsWithHttpInfo($characterId, $this->datasource);
    }

    public function createCharacterFitting(int $characterId, Fitting $fitting)
    {
        return $this->apiClient->postCharactersCharacterIdFittingsWithHttpInfo($characterId, $fitting->getModel(), $this->datasource);
    }
}
