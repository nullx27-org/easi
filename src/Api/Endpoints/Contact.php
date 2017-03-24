<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\ContactsApi;

class Contact extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new ContactsApi();
    }

    public function deleteContacts(int $characterId, array $contractIds)
    {
        return $this->apiClient->deleteCharactersCharacterIdContactsWithHttpInfo($characterId, $contractIds, $this->datasource);
    }

    public function getContacts(int $characterId, int $page = 1)
    {
        return $this->apiClient->getCharactersCharacterIdContactsWithHttpInfo($characterId, $page, $this->datasource);
    }

    public function getLabels(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdContactsLabelsWithHttpInfo($characterId, $this->datasource);
    }

    public function addContacts(int $characterId, float $standing, array $contactIds, bool $watched = false, $labelId = null)
    {
        return $this->apiClient->postCharactersCharacterIdContacts($characterId, $standing, $contactIds, $watched, $labelId, $this->datasource);
    }

    public function editContacts(int $characterId, float $standing, array $contactIds, bool $watched = false, $labelId = null)
    {
        return $this->apiClient->putCharactersCharacterIdContactsWithHttpInfo($characterId, $standing, $contactIds, $watched, $labelId, $this->datasource);
    }
}
