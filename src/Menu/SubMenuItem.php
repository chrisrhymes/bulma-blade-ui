<?php

namespace BulmaBladeUi\Menu;

class SubMenuItem
{
    /** @var string */
    public $link;

    /** @var string */
    public $text;

    public function __construct(string $link, string $text)
    {
        $this->link = $link;
        $this->text = $text;
    }
}
