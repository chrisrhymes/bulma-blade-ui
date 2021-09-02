<?php

namespace BulmaBladeUi\Exceptions;

use Exception;

class MenuItemException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct(
            $message
        );
    }
}
