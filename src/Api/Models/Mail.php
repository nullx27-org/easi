<?php

namespace nullx27\Easi\Api\Models;


use nullx27\Easi\Api\Model;

class Mail extends Model
{
    protected $_class = \nullx27\ESI\Models\PostCharactersCharacterIdMailMail::class;
    protected $_recipient = [];

    public function addRecipient(MailRecipient $recipient): void
    {
        $this->_recipient[] = $recipient->getModel();
        $this->setRecipients($this->_recipient);
    }
}