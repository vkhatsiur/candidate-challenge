<?php

namespace App\Queries;

use App\CommandBus\IQuery;
use App\CommandBus\IQueryHandler;
use App\Models\Listing;
use Illuminate\Support\Collection;

class GetTopListingsQuery implements IQuery
{
    public int $limit = 12;
}

class GetTopListingsQueryHandler implements IQueryHandler
{
    public function handle(GetTopListingsQuery $query) : Collection
    {
        return Listing::inRandomOrder()->limit($query->limit)->get();
    }
}
