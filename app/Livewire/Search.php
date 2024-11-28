<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $searchResults = [];

    public function openSearchResults()
    {
        // TODO
    }

    public function render()
    {
        return view('livewire.search');
    }
}
