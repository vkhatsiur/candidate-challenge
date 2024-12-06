<?php

namespace App\Queries;

use App\CommandBus\ICacheableQuery;
use App\CommandBus\IQueryHandler;
use App\Dtos\CategoryDto;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class GetCategoriesListQuery implements ICacheableQuery
{

    public function getCacheTtl() : int
    {
        return 60;
    }

    public function getCacheKey() : string
    {
        return 'categories';
    }
}

class GetCategoriesListQueryHandler implements IQueryHandler
{

    public function handle(GetCategoriesListQuery $query) : Collection
    {
        return Category::all()->map(function ($category) {
            return CategoryDto::create($category->name, Storage::disk('categories')->url($category->logo), $category->slug);
        });
    }
}
