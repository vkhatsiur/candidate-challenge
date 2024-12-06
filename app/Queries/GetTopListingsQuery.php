<?php

namespace App\Queries;

use App\CommandBus\ICacheableQuery;
use App\CommandBus\IQueryHandler;
use App\Models\Listing;
use Illuminate\Support\Collection;

class GetTopListingsQuery implements ICacheableQuery
{
    public int $limit = 12;

    public function getCacheTtl(): int
    {
        return 10;
    }

    public function getCacheKey(): string
    {
        return 'top_listings_' . $this->limit;
    }
}

class GetTopListingsQueryHandler implements IQueryHandler
{
    public function handle(GetTopListingsQuery $query) : Collection
    {
        return Listing::inRandomOrder()->limit($query->limit)->get();
    }
}
