<?php

namespace App\Queries;

use App\CommandBus\IQuery;
use App\CommandBus\IQueryHandler;
use App\Models\Listing;

class GetSearchHintsQuery implements IQuery
{
    public readonly string $query;

    private function __construct(string $query)
    {
        $this->query = $query;
    }

    public static function create(string $query): self
    {
        return new self($query);
    }
}

class GetSearchHintsQueryHandler implements IQueryHandler
{
    public function handle(GetSearchHintsQuery $searchQuery)
    {
        return Listing::query()
            ->where('title', 'like', '%' . $searchQuery->query . '%')
            ->get();
    }
}
