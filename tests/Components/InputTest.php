<?php

namespace Tests\Components;

use Tests\TestCase;

class InputTest extends TestCase
{
    use BaseInputComponentTests;
    use ReadOnlyInputComponentTests;
    use PlaceholderInputTests;
    use LivewireModelTests;

    protected $component = 'input';

    /**
     * @test
     * @dataProvider inputTypes
     */
    public function input_component_sets_provided_type($type, $expected)
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::input :label="$label" :name="$name" :type="$type"></x-bbui::input>',
                ['label' => 'The Input Label', 'name' => 'test', 'type' => $type]
            );

        $view->assertSee(html_entity_decode($expected));
    }

    public function inputTypes()
    {
        return [
            'empty' => [null, 'text'],
            'password' => ['password', 'password'],
            'date' => ['date', 'date'],
            'email' => ['email', 'email'],
        ];
    }

    /** @test */
    public function additional_classes_can_be_passed_to_input()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::input :label="$label" :name="$name" :options="$options" :class="$class"></x-bbui::input>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'class' => 'is-large is-rounded is-static']
            );

        $view->assertSee('class="input is-large is-rounded is-static"', false);
    }
}
