<?php

namespace Tests\Components;

use Tests\TestCase;

class MessageTest extends TestCase
{
    /** @test */
    public function it_renders_the_message_component()
    {
        $view = $this->blade(
            '<x-bbui::message :title="$title">The message content</x-bbui::message>',
            ['title' => 'The message title']
        );

        $view->assertSeeInOrder(['The message title', 'The message content']);
        $view->assertSee('message is-info');
    }

    /** @test */
    public function it_overrides_the_type()
    {
        $view = $this->blade(
            '<x-bbui::message :title="$title" :type="$type">The message content</x-bbui::message>',
            ['title' => 'The message title', 'type' => 'is-danger']
        );

        $view->assertSee('message is-danger');
        $view->assertDontSee('message is-info');
    }
}
