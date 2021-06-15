<?php

namespace Tests\Components;

use Tests\TestCase;

class TextareaTest extends TestCase
{
    use BaseInputComponentTests;
    use ReadOnlyInputComponentTests;

    protected $component = 'textarea';
}
