<?php

namespace BulmaBladeUi\Menu;

class MenuItem
{
    /** @var string */
    public $link;

    /** @var string */
    public $text;

    /** @var SubMenuItem[] */
    public $subMenu;

    public function __construct(string $link, string $text)
    {
        $this->link = $link;
        $this->text = $text;
    }
}
