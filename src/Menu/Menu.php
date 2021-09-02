<?php

namespace BulmaBladeUi\Menu;

class Menu
{
    /** @var string */
    public $label;

    /** @var MenuItem[] */
    public $items;

    public function __construct(string $label)
    {
        $this->label = $label;
        $this->items = [];
    }
}
