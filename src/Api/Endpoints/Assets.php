<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\AssetsApi;

class Assets extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new AssetsApi();
    }

    /**
     * @param int $characterId
     * @return mixed
     */
    public function getCharacterAssets(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdAssetsWithHttpInfo($characterId, $this->datasource);
    }
}
