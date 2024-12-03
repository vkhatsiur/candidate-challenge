<?php

namespace App\Queries;

use App\CommandBus\IQuery;
use App\CommandBus\IQueryHandler;
use App\Models\Category;

class GetCategoryNamesListQuery implements IQuery
{

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
