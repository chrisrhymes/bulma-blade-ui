<?php

namespace Tests\Components;

use Tests\TestCase;

class InputTest extends TestCase
{
    use BaseInputComponentTests;

    protected $component = 'input';

    /**
     * @test
     * @dataProvider inputTypes
     */
    public function input_component_sets_password_type($type, $expected)
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
}
