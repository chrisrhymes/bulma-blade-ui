<?php

namespace Tests\Components;

trait PlaceholderInputTests
{
    /** @test */
    public function inputs_render_without_placeholder()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option']]
            );

        $view->assertDontSee('placeholder');
    }

    /** @test */
    public function inputs_render_placeholder_when_set()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options" :placeholder="$placeholder"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'placeholder' => 'Enter some text']
            );

        $view->assertSee('placeholder="Enter some text"', false);
    }
}
