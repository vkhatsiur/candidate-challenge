<?php

namespace App\Livewire;

use App\CommandBus\ICommandBus;
use App\Queries\GetSearchHintsQuery;
use Livewire\Component;

class SearchBar extends Component
{
    public $query = '';
    public $results = [];

    public function openHints()
    {
        if ($this->query === '') {
            return;
        }

        $bus = app(ICommandBus::class);
        $this->results = $bus->send(GetSearchHintsQuery::create($this->query));
    }

    public function updatedQuery()
    {
        $this->openHints();
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
