<?php

use App\CommandBus\ICommandBus;
use App\Queries\GetCategoriesListQuery;
use Illuminate\Support\Facades\Route;

Route::get('/', function (ICommandBus $bus) {
    return view('index', [
        'categories' => $bus->send(new GetCategoriesListQuery())
    ]);
})->name('home');



