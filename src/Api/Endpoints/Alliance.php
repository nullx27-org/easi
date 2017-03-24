<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\AllianceApi;

class Alliance extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new AllianceApi();
    }

    /**
     * @return mixed
     */
    public function getAlliances()
    {
        return $this->apiClient->getAlliancesWithHttpInfo($this->datasource);
    }

    /**
     * @param int $allianceId
     *
     * @return mixed
     */
    public function getAlliance(int $allianceId)
    {
        return $this->apiClient->getAlliancesAllianceIdWithHttpInfo($allianceId, $this->datasource);
    }

    /**
     * @param int $allianceID
     *
     * @return mixed
     */
    public function getCorporations(int $allianceID)
    {
        return $this->apiClient->getAlliancesAllianceIdCorporationsWithHttpInfo($allianceID, $this->datasource);
    }

    /**
     * @param int $allianceId
     *
     * @return mixed
     */
    public function getLogo(int $allianceId)
    {
        return $this->apiClient->getAlliancesAllianceIdIconsWithHttpInfo($allianceId, $this->datasource);
    }

    /**
     * @param array $allianceIds
     *
     * @return mixed
     */
    public function getAllianceNames(array $allianceIds)
    {
        return $this->apiClient->getAlliancesNamesWithHttpInfo($allianceIds, $this->datasource);
    }
}
