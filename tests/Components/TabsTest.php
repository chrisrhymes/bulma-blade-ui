<?php

namespace Tests\Components;

use Tests\TestCase;

class TabsTest extends TestCase
{
    /** @test */
    public function it_renders_the_tabs_component()
    {
        $view = $this->blade(
            '<x-bbui::tabs :items="$items">
                <x-slot name="first">
                    The first slot
                </x-slot>
                <x-slot name="second">
                    The second slot
                </x-slot>
            </x-bbui::tabs>',
            [
                'items' => [
                    'first' => 'The First Tab',
                    'second' => 'The Second Tab',
                ]
            ]
        );

        $view->assertSeeInOrder(['The First Tab', 'The Second Tab']);
        $view->assertSeeInOrder(['The first slot', 'The second slot']);
        $view->assertSee('tabs');
        $view->assertSee('x-data="{ tab: \'first\' }"', false);
    }

    /** @test */
    public function it_overrides_the_type()
    {
        $view = $this->blade(
            '<x-bbui::tabs :items="$items" type="is-boxed">
                <x-slot name="first">
                    The first slot
                </x-slot>
                <x-slot name="second">
                    The second slot
                </x-slot>
            </x-bbui::tabs>',
            [
                'items' => [
                    'first' => 'The First Tab',
                    'second' => 'The Second Tab',
                ]
            ]
        );

        $view->assertSee('class="tabs is-boxed"', false);
    }

    /** @test */
    public function it_overrides_the_default_tab()
    {
        $view = $this->blade(
            '<x-bbui::tabs :items="$items" default="second">
                <x-slot name="first">
                    The first slot
                </x-slot>
                <x-slot name="second">
                    The second slot
                </x-slot>
            </x-bbui::tabs>',
            [
                'items' => [
                    'first' => 'The First Tab',
                    'second' => 'The Second Tab',
                ]
            ]
        );

        $view->assertSee('x-data="{ tab: \'second\' }"', false);
        $view->assertDontSee('x-data="{ tab: \'first\' }"', false);
    }
}
