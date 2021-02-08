<?php

namespace Tests\Components;

use Tests\TestCase;

class CardTest extends TestCase
{
    /** @test */
    public function it_renders_the_card_component_with_title()
    {
        $view = $this->blade(
            '<x-bbui::card :title="$title">The card content</x-bbui::card>',
            ['title' => 'The card title']
        );

        $view->assertSeeInOrder(['The card title', 'The card content']);
    }

    /** @test */
    public function it_renders_the_card_component_with_image()
    {
        $view = $this->blade(
            '<x-bbui::card :image="$image" :alt="$alt">The card content</x-bbui::card>',
            ['image' => '/path/to/image.jpg', 'alt' => 'The image alt tag']
        );

        $view->assertSeeInOrder(['/path/to/image.jpg', 'The image alt tag', 'The card content']);
    }

    /** @test */
    public function it_renders_the_card_component_with_footer()
    {
        $view = $this->blade(
            '<x-bbui::card :title="$title">
            The card content
            <x-slot name="footer"><a href="" class="card-footer-item">A footer link</a></x-slot>
            </x-bbui::card>',
            ['title' => 'The card title']
        );

        $view->assertSeeInOrder(['The card title', 'The card content', 'A footer link']);
    }
}
