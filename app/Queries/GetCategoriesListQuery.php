<?php

namespace App\Queries;

use App\CommandBus\IQuery;
use App\CommandBus\IQueryHandler;
use App\Dtos\CategoryDto;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class GetCategoriesListQuery implements IQuery
{

}

class GetCategoriesListQueryHandler implements IQueryHandler
{

    public function handle(GetCategoriesListQuery $query) : Collection
    {
        return Cache::remember('categories', 60, function () {
            return Category::all()->map(function ($category) {
                return CategoryDto::create($category->name, Storage::disk('categories')->url($category->logo), $category->slug);
            });
        });
    }
}
