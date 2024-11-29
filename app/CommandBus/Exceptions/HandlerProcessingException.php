<?php

namespace App\CommandBus\Exceptions;

class HandlerProcessingException extends \Exception
{
    public function __construct(string $message = '', int $code = 500, ?\Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
