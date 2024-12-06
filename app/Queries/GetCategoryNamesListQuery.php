<?php

namespace App\Queries;

use App\CommandBus\ICacheableQuery;
use App\CommandBus\IQueryHandler;
use App\Models\Category;

class GetCategoryNamesListQuery implements ICacheableQuery
{

    public function getCacheTtl(): int
    {
        return 60;
    }

    public function getCacheKey(): string
    {
        return "category_names";
    }
}

class GetCategoryNamesListQueryHandler implements IQueryHandler
{

    public function handle(GetCategoryNamesListQuery $query)
    {
        return Category::all()->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name
            ];
        });
    }
}
