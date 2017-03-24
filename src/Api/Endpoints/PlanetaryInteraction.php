<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\PlanetaryInteractionApi;


class PlanetaryInteraction extends Endpoint
{

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new PlanetaryInteractionApi();
    }

    public function getColonies(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdPlanetsWithHttpInfo($characterId, $this->datasource);
    }

    public function getColonyLayout(int $characterId, int $planetId)
    {
        return $this->apiClient->getCharactersCharacterIdPlanetsPlanetIdWithHttpInfo($characterId, $planetId, $this->datasource);
    }

    public function getSchematic(int $schematicId)
    {
        return $this->apiClient->getCharactersCharacterIdPlanetsWithHttpInfo($schematicId, $this->datasource);
    }

}