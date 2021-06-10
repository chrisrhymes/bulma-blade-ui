<?php

namespace Tests\Components;

use Tests\TestCase;

class ModalCardTest extends TestCase
{
    /** @test */
    public function it_renders_the_message_component()
    {
        $view = $this->blade(
            '<x-bbui::modal-card :title="$title">
            <x-slot name="trigger">Open Modal</x-slot>
            The modal content
            </x-bbui::modal-card>',
            ['title' => 'The modal title']
        );

        $view->assertSee('The modal content');
        $view->assertSee('button is-primary');
        $view->assertSee('modal-background');
    }

    /** @test */
    public function it_overrides_the_type()
    {
        $view = $this->blade(
            '<x-bbui::modal-card :title="$title" :type="$type">
            <x-slot name="trigger">Open Modal</x-slot>
            The modal content
            </x-bbui::modal-card>',
            ['title' => 'The modal title', 'type' => 'is-danger']
        );

        $view->assertSee('button is-danger');
        $view->assertDontSee('button is-primary');
    }

    /** @test */
    public function it_renders_the_footer()
    {
        $view = $this->blade(
            '<x-bbui::modal-card :title="$title" :cancel="$cancel">
            <x-slot name="trigger">Open Modal</x-slot>
            The modal content
            <x-slot name="footer">
                <button class="button is-info" @click="active = false">Confirm</button>
            </x-slot>
            </x-bbui::modal-card>',
            ['title' => 'The modal title', 'cancel' => 'Close Modal']
        );

        $view->assertSee('modal-card-foot');
        $view->assertSee('Close Modal');
        $view->assertDontSee('Cancel');
        $view->assertSee('Confirm');
    }
}
