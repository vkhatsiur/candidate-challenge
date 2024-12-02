<?php

namespace App\Queries;

use App\CommandBus\IQuery;
use App\CommandBus\IQueryHandler;
use App\Models\Category;
use App\Models\Listing;

class SearchListingQuery implements IQuery
{
    public readonly ?string $category;
    public readonly ?string $query;

    private function __construct(?string $query, ?string $category)
    {
        $this->category = $category;
        $this->query = $query;
    }

    public static function create(?string $query = null, ?string $category = null): self
    {
        return new self($query, $category);
    }
}

class SearchListingQueryHandler implements IQueryHandler
{
    public function handle(SearchListingQuery $searchQuery)
    {
        if ($searchQuery->query === null) {
            return Category::query()->firstWhere('slug', $searchQuery->category)->listing()->get();
        }

        return Listing::query()
            ->where('title', 'like', '%' . $searchQuery->query . '%')
            ->orWhereHas('category', function ($dbQuery) use ($searchQuery) {
                $dbQuery->where('name', 'like', '%' . $searchQuery->query . '%');
            })
            ->get();
    }
}
