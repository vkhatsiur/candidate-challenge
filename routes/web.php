<?php

use App\CommandBus\ICommandBus;
use App\Models\Listing;
use App\Queries\GetCategoriesListQuery;
use App\Queries\GetTopListingsQuery;
use App\Queries\SearchListingQuery;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function (ICommandBus $bus) {
    return view('index', [
        'categories' => $bus->send(new GetCategoriesListQuery()),
        'topListings' => $bus->send(new GetTopListingsQuery())
    ]);
})->name('home');

Route::get('/search', function (Request $request, ICommandBus $bus) {
    $query = $request->query('query');
    $category = $request->query('category');
    return view('search', ['listings' => $bus->send(SearchListingQuery::create($query, $category))]);
})->name('search');

Route::get('/{listing:slug}', function (Request $request, Listing $listing) {
    return view('listing', ['listing' => $listing]);
})->name('listing');
