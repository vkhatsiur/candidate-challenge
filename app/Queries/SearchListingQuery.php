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

    public readonly int $itemsPerPage;

    private function __construct(?string $query, ?string $category)
    {
        $this->category = $category;
        $this->query = $query;
        $this->itemsPerPage = 10;
    }

    public static function create(?string $query = null, ?string $category = null): self
    {
        return new self($query, $category);
    }

    public function hasFilters(): bool
    {
        return $this->category !== null || $this->query !== null;
    }
}

class SearchListingQueryHandler implements IQueryHandler
{
    public function handle(SearchListingQuery $searchQuery)
    {
        if (!$searchQuery->hasFilters()) {
            return Listing::query()->paginate($searchQuery->itemsPerPage);
        }

        if ($searchQuery->query === null) {
            return Category::query()->firstWhere('slug', $searchQuery->category)->listing()->paginate($searchQuery->itemsPerPage)->appends(['category' => $searchQuery->category]);
        }

        return Listing::query()
            ->where('title', 'like', '%' . $searchQuery->query . '%')
            ->orWhereHas('category', function ($dbQuery) use ($searchQuery) {
                $dbQuery->where('name', 'like', '%' . $searchQuery->query . '%');
            })
            ->paginate($searchQuery->itemsPerPage)
            ->appends(['query' => $searchQuery->query]);
    }
}
