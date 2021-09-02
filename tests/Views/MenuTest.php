<?php

namespace Tests\Views;

use BulmaBladeUi\Menu\MenuBuilder;
use Illuminate\Support\Facades\Request;
use Tests\TestCase;

class MenuTest extends TestCase
{
    /** @test */
    public function it_renders_a_menu()
    {
        $myMenu = new MenuBuilder();
        $myMenu->addLabel('Test Label');

        $view = $this->blade(
            '@include("bbui::menu", ["menus" => $myMenu])',
            ['myMenu' => $myMenu->get()]
        );

        $view->assertSee('<aside class="menu">', false);
        $view->assertSee('<p class="menu-label">Test Label</p>', false);
    }

    /** @test */
    public function it_renders_a_menu_with_items()
    {
        $myMenu = new MenuBuilder();
        $myMenu->addLabel('Test Label')
            ->addItem('/test', 'Item 1')
            ->addItem('/test2', 'Item 2');

        $view = $this->blade(
            '@include("bbui::menu", ["menus" => $myMenu])',
            ['myMenu' => $myMenu->get()]
        );

        $view->assertSee('<a href="/test" class="">Item 1</a>', false);
        $view->assertSee('<a href="/test2" class="">Item 2</a>', false);
    }

    /** @test */
    public function it_renders_a_menu_with_sub_items()
    {
        $myMenu = new MenuBuilder();
        $myMenu->addLabel('Test Label')
            ->addItem('/test', 'Item 1')
            ->addSubItem('/test2', 'Sub Item 1')
            ->addSubItem('/test3', 'Sub Item 2');

        $view = $this->blade(
            '@include("bbui::menu", ["menus" => $myMenu])',
            ['myMenu' => $myMenu->get()]
        );

        $view->assertSee('<a href="/test2" class="">Sub Item 1</a>', false);
        $view->assertSee('<a href="/test3" class="">Sub Item 2</a>', false);
    }


}
