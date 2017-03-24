<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\SearchApi;


class Search extends Endpoint
{

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new SearchApi();
    }

    public function characterSearch(int $characterId, string $search, array $categories, string $language = null, bool $strict = false)
    {
        return $this->apiClient->getCharactersCharacterIdSearchWithHttpInfo($characterId, $search, $categories, $language, $strict, $this->datasource);
    }

    public function search(string $search, array $categories, string $language = null, bool $strict = false)
    {
        return $this->apiClient->getSearchWithHttpInfo($search, $categories, $language, $strict, $this->datasource);
    }

}