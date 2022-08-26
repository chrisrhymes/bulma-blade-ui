<?php

namespace Tests\Components;

use Tests\Components\BaseInputComponentTests;
use Tests\TestCase;

class SelectTest extends TestCase
{
    use BaseInputComponentTests;

    protected $component = 'select';

    /** @test */
    public function options_are_listed()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option', 'second' => 'Second option']]
            );

        $view->assertSeeInOrder(['first', 'second']);
        $view->assertSeeInOrder(['First option', 'Second option']);
    }

    /** @test */
    public function additional_classes_can_be_passed_to_select()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options" :class="$class"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'class' => 'is-large is-rounded is-static']
            );

        $view->assertSee('class="select is-large is-rounded is-static"', false);
    }

    /** @test */
    public function select_render_placeholder_when_set()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options" :placeholder="$placeholder"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'placeholder' => 'Select an option']
            );

        $view->assertSee('<option value="" >Select an option</option>', false);
    }

    /** @test */
    public function select_render_placeholder_but_hides_it_from_selection_when_set()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options" :placeholder="$placeholder" :hide-placeholder-from-selection="$hidePlaceholderFromSelection"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'placeholder' => 'Select an option', 'hidePlaceholderFromSelection' => true]
            );

        $view->assertSee('<option value=""  hidden >Select an option</option>', false);
    }
}
