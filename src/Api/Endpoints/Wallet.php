<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\WalletApi;

class Wallet extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new WalletApi();
    }

    public function getCharacterWallet(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdWalletsWithHttpInfo($characterId, $this->datasource);
    }
}
