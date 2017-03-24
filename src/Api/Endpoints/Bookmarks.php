<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\BookmarksApi;

class Bookmarks extends Endpoint
{

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new BookmarksApi();
    }

    /**
     * @param int $characterId
     * @return mixed
     */
    public function getBookmarks(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdBookmarksWithHttpInfo($characterId, $this->datasource);
    }

    /**
     * @param int $characterId
     * @return mixed
     */
    public function getFolders(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdBookmarksFoldersWithHttpInfo($characterId, $this->datasource);
    }
}
