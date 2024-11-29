<?php

namespace App\Livewire;

use App\CommandBus\ICommandBus;
use App\Queries\GetCategoriesListQuery;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $searchResults = [];

    public function openSearchResults()
    {
        $bus = app(ICommandBus::class);
        $this->searchResults = $bus->send(new GetCategoriesListQuery());
    }

    public function render()
    {
        return view('livewire.search');
    }
}
