<?php

namespace Tests\Components;

trait ReadOnlyInputComponentTests
{
    /** @test */
    public function input_are_not_readonly_by_default()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option']]
            );

        $view->assertDontSee('readonly');
    }

    /** @test */
    public function input_can_be_readonly()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options" :readonly="$readonly"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'readonly' => true]
            );

        $view->assertSee('readonly');
    }
}
