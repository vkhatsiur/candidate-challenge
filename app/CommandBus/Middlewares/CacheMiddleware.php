<?php

namespace App\CommandBus\Middlewares;

use App\CommandBus\ICacheableQuery;
use App\CommandBus\ICommand;
use App\CommandBus\IQuery;
use Illuminate\Support\Facades\Cache;

class CacheMiddleware implements IMiddleware
{
    public function handle(IQuery|ICommand $request, callable $next)
    {
        if ($request instanceof ICacheableQuery) {
            return Cache::remember($request->getCacheKey(), $request->getCacheTtl(), function () use ($request, $next) {
                return $next($request);
            });
        }

        return $next($request);
    }
}
