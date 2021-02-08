<?php

namespace Tests\Components;

use Illuminate\View\ViewException;

trait BaseInputComponentTests
{
    /** @test */
    public function input_component_renders()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test']
            );

        $view->assertSee('The Input Label');
    }

    /** @test */
    public function input_component_renders_error_message()
    {
        $view = $this->withViewErrors(['test' => 'The test field is required'])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test']
            );

        $view->assertSee('The test field is required');
        $view->assertSee('is-danger');
    }

    /** @test */
    public function input_component_wont_render_without_label()
    {
        $this->expectException(ViewException::class);
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :name="$name"></x-bbui::'.$this->component.'>',
                ['name' => 'test']
            );
    }

    /** @test */
    public function input_is_required()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :required="true" :options="$options"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option']]
            );

        $view->assertSee(html_entity_decode('required'));
    }
}
