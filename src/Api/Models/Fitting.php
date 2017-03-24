<?php

namespace nullx27\Easi\Api\Models;


use nullx27\Easi\Api\Model;

class Fitting extends Model
{
    protected $_class = \nullx27\ESI\Models\PostCharactersCharacterIdFittingsFitting::class;

    protected $_items = [];

    public function addItem(FittingItem $item): void
    {
        $this->_items[] = $item->getModel();
        $this->setItems($this->_items);
    }
}