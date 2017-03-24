<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\CharacterApi;
use nullx27\ESI\Models\PostCharactersCharacterIdCspaCharacters;

class Character extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new CharacterApi();
    }

    public function getCharacter(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdWithHttpInfo($characterId, $this->datasource);
    }

    public function getCorporationHistory(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdCorporationhistoryWithHttpInfo($characterId, $this->datasource);
    }

    public function getProtrait(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdPortraitWithHttpInfo($characterId, $this->datasource);
    }

    public function getCharactersNames(array $characterIds)
    {
        return $this->apiClient->getCharactersNamesWithHttpInfo($characterIds, $this->datasource);
    }

    public function calculateCspa(int $characterId, array $characters)
    {
        $charactersModel = new PostCharactersCharacterIdCspaCharacters(compact($characters));

        return $this->apiClient->postCharactersCharacterIdCspaWithHttpInfo($characterId, $charactersModel, $this->datasource);
    }
}
