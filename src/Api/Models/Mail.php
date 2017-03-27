<?php

namespace nullx27\Easi\Api\Models;

use nullx27\Easi\Api\Model;

class Mail extends Model
{
    protected $class = \nullx27\ESI\Models\PostCharactersCharacterIdMailMail::class;
    protected $recipient = [];

    /**
     * @param MailRecipient $recipient
     */
    public function addRecipient(MailRecipient $recipient)
    {
        $this->recipient[] = $recipient->getModel();
        $this->setRecipients($this->recipient);
    }
}
