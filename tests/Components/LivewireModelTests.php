<?php

namespace Tests\Components;

trait LivewireModelTests
{
    /** @test */
    public function wire_model_can_be_debounced()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :wire:model.debounce.500ms="$model" :options="$options"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'model' => 'testModel']
            );

        $view->assertSee('wire:model.debounce.500ms="testModel"', false);
    }

    /** @test */
    public function wire_model_can_be_lazy()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :wire:model.lazy="$model" :options="$options"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'model' => 'testModel']
            );

        $view->assertSee('wire:model.lazy="testModel"', false);
    }

    /** @test */
    public function wire_model_can_be_deferred()
    {
        $view = $this->withViewErrors([])
            ->blade(
                '<x-bbui::'.$this->component.' :label="$label" :name="$name" :wire:model.defer="$model" :options="$options"></x-bbui::'.$this->component.'>',
                ['label' => 'The Input Label', 'name' => 'test', 'options' => ['first' => 'First option'], 'model' => 'testModel']
            );

        $view->assertSee('wire:model.defer="testModel"', false);
    }
}
