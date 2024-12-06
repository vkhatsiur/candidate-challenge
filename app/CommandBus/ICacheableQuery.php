<?php

namespace App\CommandBus;

interface ICacheableQuery extends IQuery
{
    public function getCacheTtl() : int;

    public function getCacheKey() : string;
}
