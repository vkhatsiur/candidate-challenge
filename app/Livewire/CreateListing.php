<?php

namespace App\Livewire;

use App\CommandBus\ICommandBus;
use App\Enums\Currency;
use App\Livewire\Forms\ListingForm;
use App\Queries\GetCategoryNamesListQuery;
use Livewire\Component;

class CreateListing extends Component
{
    public ListingForm $form;

    public $currencies = [];
    public $categories = [];

    public function mount()
    {
        $bus = app(ICommandBus::class);
        $this->categories = $bus->send(new GetCategoryNamesListQuery());
        $this->form->category_id = $this->categories[0]['id'];

        $this->currencies = Currency::cases();
        $this->form->currency = $this->currencies[0]->value;
    }

    public function save() {
        $this->form->store();
        return redirect()->to(route('home'));
    }

    public function publish() {
        $this->form->publish();
        return redirect()->to(route('home'));
    }

    public function render()
    {
        return view('livewire.create-listing');
    }
}
