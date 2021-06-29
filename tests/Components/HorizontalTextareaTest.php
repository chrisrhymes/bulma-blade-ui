<?php

namespace Tests\Components;

use Tests\TestCase;

class HorizontalTextareaTest extends TestCase
{
    use BaseInputComponentTests;
    use ReadOnlyInputComponentTests;
    use PlaceholderInputTests;

    protected $component = 'horizontal-input';
}
