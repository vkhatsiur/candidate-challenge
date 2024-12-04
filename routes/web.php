<?php

use App\CommandBus\ICommandBus;
use App\Commands\DestroyListingCommand;
use App\Commands\SignInCommand;
use App\Commands\SignOutCommand;
use App\Commands\SignUpCommand;
use App\Livewire\CreateListing;
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

Route::middleware('guest')->group(function () {
    Route::get('/sign-in', fn() => view('auth.sign-in'))->name('login');
    Route::post('/sign-in', fn(ICommandBus $bus) => $bus->send(new SignInCommand()))->name('store-sign-in');

    Route::get('/sign-up', fn() => view('auth.sing-up'))->name('create-sign-up');
    Route::post('/sign-up', fn(ICommandBus $bus) => $bus->send(new SignUpCommand()))->name('store-sign-up');
});

Route::middleware('auth')->group(function () {
    Route::delete('/sign-out', fn(ICommandBus $bus) => $bus->send(new SignOutCommand()))->name('sign-out');
    Route::get('/listings/create', CreateListing::class)->name('listings.create');
    Route::delete('/listings/{listing:slug}', fn(ICommandBus $bus, Listing $listing) => $bus->send(new DestroyListingCommand($listing)))->name('destroy-listing');
});

Route::get('/{listing:slug}', fn(Request $request, Listing $listing) => view('listings.index', ['listing' => $listing]))->name('listing');


