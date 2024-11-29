<?php

namespace App\Queries;

use App\CommandBus\IQuery;
use App\CommandBus\IQueryHandler;

class GetCategoriesListQuery implements IQuery
{

}

class GetCategoriesListQueryHandler implements IQueryHandler
{

    public function handle(GetCategoriesListQuery $query)
    {
        return ['test cat 1', 'test cat 2'];
    }
}
