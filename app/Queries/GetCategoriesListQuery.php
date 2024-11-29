<?php

namespace App\Queries;

use App\CommandBus\IQuery;
use App\CommandBus\IQueryHandler;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class GetCategoriesListQuery implements IQuery
{

}

class GetCategoriesListQueryHandler implements IQueryHandler
{

    public function handle(GetCategoriesListQuery $query)
    {
        return Category::all()->map(function ($category) {
            return Storage::disk('categories')->url($category->logo);
        });
    }
}
