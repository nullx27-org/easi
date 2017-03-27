<?php

namespace nullx27\Easi\Api\Models;

use nullx27\Easi\Api\Model;

class Fitting extends Model
{
    protected $class = \nullx27\ESI\Models\PostCharactersCharacterIdFittingsFitting::class;

    protected $items = [];

    /**
     * @param FittingItem $item
     */
    public function addItem(FittingItem $item)
    {
        $this->items[] = $item->getModel();
        $this->setItems($this->items);
    }
}
