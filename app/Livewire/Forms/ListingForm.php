<?php

namespace App\Livewire\Forms;

use App\Models\Listing;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ListingForm extends Form
{
    #[Validate(['required'])]
    public $title = '';

    public $slug = '';

   #[Validate(['required', 'integer'])]
   public $status = 'Active';

    #[Validate(['nullable'])]
    public $description = '';

    public $published_at = '';

    #[Validate(['required', 'integer'])]
    public $price = '';

    public $image = '';

    #[Validate(['required'])]
    public $currency = '';

//    #[Validate(['required', 'integer'])]
    public $user_id = 1;

    #[Validate(['required', 'integer'])]
    public $category_id;

    public function store() {
        $this->validate();
        $this->slug = Str::slug($this->title);
        $seed = random_int(1000, 10000);
        $this->image = "https://picsum.photos/seed/{$seed}/640/320";


        Listing::create($this->only(['title', 'description', 'status', 'slug', 'price', 'currency', 'image', 'category_id', 'user_id']));
    }
}
