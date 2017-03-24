<?php

namespace nullx27\Easi\Api\Endpoints;

use nullx27\Easi\Api\Endpoint;
use nullx27\Easi\Api\Models\Mail as MailModel;
use nullx27\Easi\Api\Models\MailLabel;
use nullx27\Easi\Api\Models\MailMetadata;
use nullx27\ESI\Api\MailApi;

class Mail extends Endpoint
{
    public function __construct($datasource)
    {
        $this->datasource = $datasource;
        $this->apiClient = new MailApi();
    }

    public function deleteLabel(int $characterId, int $labelId)
    {
        return $this->apiClient->deleteCharactersCharacterIdMailLabelsLabelIdWithHttpInfo($characterId, $labelId, $this->datasource);
    }

    public function deleteMail(int $characterId, int $mailId)
    {
        return $this->apiClient->deleteCharactersCharacterIdMailMailIdWithHttpInfo($characterId, $mailId, $this->datasource);
    }

    public function getHeaders(int $characterId, array $labels = null, int $lastMailId = null)
    {
        return $this->apiClient->getCharactersCharacterIdMailWithHttpInfo($characterId, $labels, $lastMailId, $this->datasource);
    }

    public function getLabelsAndUnreadCounts(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdMailLabelsWithHttpInfo($characterId, $this->datasource);
    }

    public function getMailinglists(int $characterId)
    {
        return $this->apiClient->getCharactersCharacterIdMailListsWithHttpInfo($characterId, $this->datasource);
    }

    public function getMail(int $characterId, int $mailId)
    {
        return $this->apiClient->getCharactersCharacterIdMailMailIdWithHttpInfo($characterId, $mailId, $this->datasource);
    }

    public function sendMail(int $characterId, MailModel $mail)
    {
        return $this->apiClient->getCharactersCharacterIdMailMailIdWithHttpInfo($characterId, $mail->getModel(), $this->datasource);
    }

    public function createLabel(int $characterId, MailLabel $label = null)
    {
        $model = is_null($label) ? null : $label->getModel();

        return $this->apiClient->getCharactersCharacterIdMailMailIdWithHttpInfo($characterId, $model, $this->datasource);
    }

    public function updateMeta(int $characterId, int $mailId, MailMetadata $meta)
    {
        return $this->apiClient->putCharactersCharacterIdMailMailIdWithHttpInfo($characterId, $mailId, $meta->getModel(), $this->datasource);
    }
}
