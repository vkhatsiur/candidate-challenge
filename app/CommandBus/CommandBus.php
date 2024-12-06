<?php

namespace App\CommandBus;

use App\CommandBus\Exceptions\HandlerNotFoundException;
use App\CommandBus\Exceptions\HandlerProcessingException;
use App\CommandBus\Middlewares\CacheMiddleware;
use Illuminate\Validation\ValidationException;

class CommandBus implements ICommandBus
{
    protected $middlewares = [];

    public function __construct()
    {
        $this->middlewares = [
            new CacheMiddleware()
        ];
    }

    public function send(IQuery|ICommand $request)
    {
        $handlerClass = get_class($request) . 'Handler';

        if (!class_exists($handlerClass)) {
            throw new HandlerNotFoundException("Handler for " . get_class($request) . " not found.");
        }

        $handler = app($handlerClass);
        $pipeline = $this->createPipline($handler);
        try {
            return $pipeline($request);
        } catch (ValidationException $ex)
        {
            throw $ex;
        }
        catch (\Exception $exception) {
            throw new HandlerProcessingException('Cannot to process the ' . get_class($request), previous: $exception);
        }
    }

    private function createPipline($handler)
    {
        return array_reduce(
            $this->middlewares,
            function ($next, $middleware) {
                return function ($request) use ($next, $middleware) {
                    return $middleware->handle($request, $next);
                };
            },
            function ($request) use ($handler) {
                return $handler->handle($request);
            }
        );
    }
}
