<?php

namespace App\CommandBus\Middlewares;

use App\CommandBus\ICommand;
use App\CommandBus\IQuery;

interface IMiddleware
{
    public function handle(IQuery|ICommand $request, callable $next);
}
