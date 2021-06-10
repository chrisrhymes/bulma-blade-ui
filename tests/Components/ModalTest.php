<?php

namespace Tests\Components;

use Tests\TestCase;

class ModalTest extends TestCase
{
    /** @test */
    public function it_renders_the_message_component()
    {
        $view = $this->blade(
            '<x-bbui::modal>
            <x-slot name="trigger">Open Modal</x-slot>
            The modal content
            </x-bbui::modal>',
            []
        );

        $view->assertSee('The modal content');
        $view->assertSee('button is-primary');
        $view->assertSee('modal-background');
    }

    /** @test */
    public function it_overrides_the_type()
    {
        $view = $this->blade(
            '<x-bbui::modal :type="$type">
            <x-slot name="trigger">Open Modal</x-slot>
            The modal content
            </x-bbui::modal>',
            ['type' => 'is-danger']
        );

        $view->assertSee('button is-danger');
        $view->assertDontSee('button is-primary');
    }
}
