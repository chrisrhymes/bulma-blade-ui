<?php

namespace BulmaBladeUi\Menu;

use BulmaBladeUi\Exceptions\MenuItemException;

class MenuBuilder
{
    private array $menus = [];

    public function addLabel(string $label): self
    {
        $this->menus[] = new Menu($label);
        return $this;
    }

    public function addItem(string $link, string $text): self
    {
        $this->menus[$this->lastMenuKey()]->items[] = new MenuItem($link, $text);
        return $this;
    }

    public function addSubItem(string $link, string $text): self
    {
        $this->menus[$this->lastMenuKey()]
            ->items[$this->lastItemKey()]
            ->subMenu[] = new SubMenuItem($link, $text);

        return $this;
    }

    public function get()
    {
        return $this->menus;
    }

    private function lastMenuKey()
    {
        if (empty($this->menus)) {
            throw new MenuItemException('There are no labels in the menu builder');
        }

        return array_key_last($this->menus);
    }

    private function lastItemKey()
    {
        $lastMenuKey = $this->lastMenuKey();
        $lastItems = $this->menus[$lastMenuKey]->items;

        if (empty($lastItems)) {
            throw new MenuItemException("There are no items under the label `{$this->menus[$lastMenuKey]->label}`");
        }

        return array_key_last($lastItems);
    }
}
