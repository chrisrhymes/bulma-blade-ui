<?php

namespace Tests\Components;

use Facade\Ignition\Exceptions\ViewException;
use Tests\TestCase;

class InputTest extends TestCase
{
    /** @test */
    public function input_component_renders()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::input :label="$label" :name="$name"></x-bbui::input>',
                ['label' => 'The Input Label', 'name' => 'test']
            );

        $view->assertSee('The Input Label');
    }

    /** @test */
    public function input_component_renders_error_message()
    {
        $view = $this->withViewErrors(['test' => 'The test field is required'])
            ->blade(
                '<x-bbui::input :label="$label" :name="$name"></x-bbui::input>',
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
                '<x-bbui::input :name="$name"></x-bbui::input>',
                ['name' => 'test']
            );
    }

    /** @test */
    public function input_component_sets_password_type()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::input :label="$label" :name="$name" type="password"></x-bbui::input>',
                ['label' => 'The Input Label', 'name' => 'test', ]
            );

        $view->assertSee(html_entity_decode('password'));
    }
}
