<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\LocationApi;

class Location extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new LocationApi();
    }

    public function getCharacterKillmails(int $characterId, int $maCount = 50, $maxKillId = null)
    {
        return $this->apiClient->getCharactersCharacterIdKillmailsRecentWithHttpInfo($characterId, $maCount, $maxKillId, $this->datasource);
    }

    public function getKillmail(int $killmailId, string $killmailHash)
    {
        return $this->apiClient->getKillmailsKillmailIdKillmailHashWithHttpInfo($killmailId, $killmailHash, $this->datasource);
    }
}
