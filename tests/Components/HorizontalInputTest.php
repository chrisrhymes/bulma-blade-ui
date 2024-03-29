<?php

namespace Tests\Components;

use Illuminate\View\ViewException;
use Tests\TestCase;

class HorizontalInputTest extends TestCase
{
    use BaseInputComponentTests;
    use ReadOnlyInputComponentTests;
    use PlaceholderInputTests;
    use LivewireModelTests;

    protected $component = 'horizontal-input';

    /**
     * @test
     * @dataProvider horizontalInputTypes
     */
    public function horizontal_input_component_sets_password_type($type, $expected)
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::horizontal-input :label="$label" :name="$name" :type="$type"></x-bbui::horizontal-input>',
                ['label' => 'The horizontal-input Label', 'name' => 'test', 'type' => $type]
            );

        $view->assertSee(html_entity_decode($expected));
    }

    public function horizontalInputTypes()
    {
        return [
            'empty' => [null, 'text'],
            'password' => ['password', 'password'],
            'date' => ['date', 'date'],
            'email' => ['email', 'email'],
        ];
    }

    /** @test */
    public function additional_classes_can_be_passed_to_horizontal_input()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::horizontal-input :label="$label" :name="$name" :options="$options" :class="$class"></x-bbui::horizontal-input>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'class' => 'is-large is-rounded is-static']
            );

        $view->assertSee('class="input is-large is-rounded is-static"', false);
    }
}
