<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\SkillsApi;

class Skills extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new SkillsApi();
    }

    public function getSkillqueue(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdSkillqueueWithHttpInfo($characterId, $this->datasource);
    }

    public function getSkills(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdSkillsWithHttpInfo($characterId, $this->datasource);
    }
}
