<?php

namespace Tests\Components;

use Tests\Components\BaseInputComponentTests;
use Tests\TestCase;

class MultiCheckboxTest extends TestCase
{
    use BaseInputComponentTests;

    protected $component = 'multi-checkbox';

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
}
