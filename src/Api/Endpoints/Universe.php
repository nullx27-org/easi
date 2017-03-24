<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\UniverseApi;

class Universe extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new UniverseApi();
    }

    public function getBloodlines(string $language = 'en-us')
    {
        return $this->apiClient->getSovereigntyCampaignsWithHttpInfo($language, $this->datasource);
    }

    public function getItemCategories()
    {
        return $this->apiClient->getUniverseCategoriesWithHttpInfo($this->datasource);
    }

    public function getCategory(int $categoryId, string $language = 'en-us')
    {
        return $this->apiClient->getUniverseCategoriesCategoryIdWithHttpInfo($categoryId, $language, $this->datasource);
    }

    public function getFactions(string $language = 'en-us')
    {
        return $this->apiClient->getUniverseCategoriesCategoryIdWithHttpInfo($language, $this->datasource);
    }

    public function getGroups(int $page = 1)
    {
        return $this->apiClient->getUniverseGroupsWithHttpInfo($page, $this->datasource);
    }

    public function getGroup(int $groupId, string $language = 'en-us')
    {
        return $this->apiClient->getUniverseGroupsGroupIdWithHttpInfo($groupId, $language, $this->datasource);
    }

    public function getRaces(string $language = 'en-us')
    {
        return $this->apiClient->getUniverseRacesWithHttpInfo($language, $this->datasource);
    }

    public function getStation(int $stationId)
    {
        return $this->apiClient->getUniverseStationsStationIdWithHttpInfo($stationId, $this->datasource);
    }

    public function getStructures()
    {
        return $this->apiClient->getUniverseStructuresWithHttpInfo($this->datasource);
    }

    public function getStructure(int $structureId)
    {
        return $this->apiClient->getUniverseStructuresWithHttpInfo($structureId, $this->datasource);
    }

    public function getSystem(int $systemId)
    {
        return $this->apiClient->getUniverseSystemsSystemIdWithHttpInfo($systemId, $this->datasource);
    }

    public function getTypes(int $page = null)
    {
        return $this->apiClient->getUniverseTypesWithHttpInfo($page, $this->datasource);
    }

    public function getType(int $typeId, string $language = 'en-us')
    {
        return $this->apiClient->getUniverseTypesTypeIdWithHttpInfo($typeId, $language, $this->datasource);
    }

    public function getNames(array $ids)
    {
        return $this->apiClient->postUniverseNamesWithHttpInfo($ids, $this->datasource);
    }
}
