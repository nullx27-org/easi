<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\ESI\Api\CalendarApi;

class Calendar extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new CalendarApi();
    }

    public function getCalendar(int $characterId, $eventId = nulll)
    {
        return $this->apiClient->getCharactersCharacterIdCalendarWithHttpInfo($characterId, $eventId, $this->datasource);
    }

    public function getEvent(int $characterId, int $eventId)
    {
        return $this->apiClient->getCharactersCharacterIdCalendarEventIdWithHttpInfo($characterId, $eventId, $this->datasource);
    }

    public function createResponse(int $characterId, int $eventId, CalendarEventResponse $response)
    {
        return $this->putCharactersCharacterIdCalendarEventIdWithHttpInfo($characterId, $eventId, $response->getModel(), $this->datasource);
    }
}
