<?php

namespace Tests\Components;

use Tests\TestCase;

class NotificationTest extends TestCase
{
    /** @test */
    public function it_renders_the_notification_component()
    {
        $view = $this->blade(
            '<x-bbui::notification :title="$title">The notification content</x-bbui::notification>',
            ['title' => 'The notification title']
        );

        $view->assertSeeInOrder(['The notification title', 'The notification content']);
        $view->assertSee('notification is-info');
    }

    /** @test */
    public function it_overrides_the_type()
    {
        $view = $this->blade(
            '<x-bbui::notification :title="$title" :type="$type">The notification content</x-bbui::notification>',
            ['title' => 'The notification title', 'type' => 'is-danger']
        );

        $view->assertSee('notification is-danger');
        $view->assertDontSee('notification is-info');
    }
}
