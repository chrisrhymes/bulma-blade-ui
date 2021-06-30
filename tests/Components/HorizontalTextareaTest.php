<?php

namespace Tests\Components;

use Tests\TestCase;

class HorizontalTextareaTest extends TestCase
{
    use BaseInputComponentTests;
    use ReadOnlyInputComponentTests;
    use PlaceholderInputTests;
    use LivewireModelTests;

    protected $component = 'horizontal-textarea';

    /** @test */
    public function additional_classes_can_be_passed_to_horizontal_textarea()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :options="$options" :class="$class"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'class' => 'is-large is-rounded is-static']
            );

        $view->assertSee('class="textarea is-large is-rounded is-static"', false);
    }
}
