<?php

namespace Exceptions;

use Throwable;

class SetPropertyException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message .= ". Magic setting a property is not the jedi way";
    }
}