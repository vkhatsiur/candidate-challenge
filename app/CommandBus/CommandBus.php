<?php

namespace App\CommandBus;

use App\CommandBus\Exceptions\HandlerNotFoundException;
use App\CommandBus\Exceptions\HandlerProcessingException;

class CommandBus implements ICommandBus
{
    public function send(IQuery|ICommand $request)
    {
        $handlerClass = get_class($request) . 'Handler';

        if (!class_exists($handlerClass)) {
            throw new HandlerNotFoundException("Handler for " . get_class($request) . " not found.");
        }

        $handler = app($handlerClass);
        try {
            return $handler->handle($request);
        } catch (\Exception $exception) {
            throw new HandlerProcessingException('Cannot to process the ' . get_class($request));
        }
    }
}
