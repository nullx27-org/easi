<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\Easi\Api\Models\UserInterfaceNewMail;
use nullx27\ESI\Api\UserInterfaceApi;

class UserInterface extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new UserInterfaceApi();
    }

    public function setWaypoint(int $destinationSystemId, bool $clearOtherWaypoints, bool $addToBeginning)
    {
        return $this->apiClient->postUiAutopilotWaypointWithHttpInfo($destinationSystemId, $clearOtherWaypoints, $addToBeginning, $this->datasource);
    }

    public function openContracts(int $contactId)
    {
        return $this->apiClient->postUiOpenwindowContractWithHttpInfo($contactId, $this->datasource);
    }

    public function openInfo(int $targetId)
    {
        return $this->apiClient->postUiOpenwindowInformationWithHttpInfo($targetId, $this->datasource);
    }

    public function openMarketDetails(int $typeId)
    {
        return $this->apiClient->postUiOpenwindowMarketdetailsWithHttpInfo($typeId, $this->datasource);
    }

    public function openNewMail(UserInterfaceNewMail $mail)
    {
        return $this->apiClient->postUiOpenwindowNewmailWithHttpInfo($mail, $this->datasource);
    }
}
