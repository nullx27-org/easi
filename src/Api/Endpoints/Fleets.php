<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\Easi\Api\Models\FleetInvitation;
use nullx27\Easi\Api\Models\FleetMovement;
use nullx27\Easi\Api\Models\FleetSettings;
use nullx27\Easi\Api\Models\FleetSquadName;
use nullx27\Easi\Api\Models\FleetWingName;
use nullx27\ESI\Api\FleetsApi;

class Fleets extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new FleetsApi();
    }

    public function kickMember(int $fleetId, int $memberId)
    {
        return $this->apiClient->deleteFleetsFleetIdMembersMemberIdWithHttpInfo($fleetId, $memberId, $this->datasource);
    }

    public function removeSquad(int $fleetId, int $squadId)
    {
        return $this->apiClient->deleteFleetsFleetIdSquadsSquadIdWithHttpInfo($fleetId, $squadId, $this->datasource);
    }

    public function removeWing(int $fleetId, int $wingId)
    {
        return $this->apiClient->deleteFleetsFleetIdWingsWingIdWithHttpInfo($fleetId, $wingId, $this->datasource);
    }

    public function getFleet(int $fleetId)
    {
        return $this->apiClient->getFleetsFleetIdWithHttpInfo($fleetId, $this->datasource);
    }

    public function getMembers(int $fleetId, $language = null)
    {
        return $this->apiClient->getFleetsFleetIdMembersWithHttpInfo($fleetId, $language, $this->datasource);
    }

    public function getWings(int $fleetId, $language = null)
    {
        return $this->apiClient->getFleetsFleetIdWingsWithHttpInfo($fleetId, $language, $this->datasource);
    }

    public function invite(int $fleetId, FleetInvitation $invitation)
    {
        return $this->apiClient->postFleetsFleetIdMembersWithHttpInfo($fleetId, $invitation->getModel(), $this->datasource);
    }

    public function createWing(int $fleetId)
    {
        return $this->apiClient->postFleetsFleetIdWingsWithHttpInfo($fleetId, $this->datasource);
    }

    public function updateSettings(int $fleetId, FleetSettings $settings)
    {
        return $this->apiClient->putFleetsFleetIdWithHttpInfo($fleetId, $settings->getModel(), $this->datasource);
    }

    public function moveMember(int $fleetId, int $memberId, FleetMovement $movement)
    {
        return $this->apiClient->putFleetsFleetIdMembersMemberIdWithHttpInfo($fleetId, $memberId, $movement->getModel(), $this->datasource);
    }

    public function renameSquad(int $fleetId, int $squadId, FleetSquadName $name)
    {
        return $this->apiClient->putFleetsFleetIdSquadsSquadIdWithHttpInfo($fleetId, $squadId, $name->getModel(), $this->datasource);
    }

    public function renameWing(int $fleetId, int $wingId, FleetWingName $name)
    {
        return $this->apiClient->putFleetsFleetIdWingsWingIdWithHttpInfo($fleetId, $wingId, $name->getModel(), $this->datasource);
    }
}
