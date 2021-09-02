<?php

namespace Tests\Unit;

use BulmaBladeUi\Exceptions\MenuItemException;
use BulmaBladeUi\Menu\MenuBuilder;
use Tests\TestCase;

class MenuBuilderTest extends TestCase
{
    /** @test */
    public function add_item_without_label_throws_a_menu_item_exception()
    {
        $this->expectException(MenuItemException::class);
        $this->expectExceptionMessage('There are no labels in the menu builder');

        $myMenu = new MenuBuilder();
        $myMenu->addItem('/test', 'Test')
            ->get();
    }

    /** @test */
    public function add_sub_item_without_item_throws_a_menu_item_exception()
    {
        $this->expectException(MenuItemException::class);
        $this->expectExceptionMessage('There are no items under the label `Test`');

        $myMenu = new MenuBuilder();
        $myMenu->addLabel('Test')
            ->addSubItem('/test', 'Test')
            ->get();
    }

    /** @test */
    public function add_sub_item_without_label_throws_a_menu_item_exception()
    {
        $this->expectException(MenuItemException::class);
        $this->expectExceptionMessage('There are no labels in the menu builder');

        $myMenu = new MenuBuilder();
        $myMenu->addSubItem('/test', 'Test')
            ->get();
    }
}
