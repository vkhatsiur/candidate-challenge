<?php

namespace App\Livewire\Forms;

use App\Enums\ListingStatus;
use App\Models\Listing;
use Illuminate\Support\Str;
use Livewire\Form;

class ListingForm extends Form
{
    public $title = '';

    public $slug = '';

    public $status;

    public $description = '';

    public $published_at = '';

    public $price = 0;

    public $image = '';

    public $currency = '';

    public $user_id = 1;

    public $category_id;

    public function store()
    {
        $this->status = ListingStatus::Draft->value;
        $this->save();
    }

    public function publish()
    {
        $this->status = ListingStatus::Active->value;
        $this->save();
    }

    private function save() {
        $rules = ListingForm::getValidationRules($this->status);
        $this->validate($rules);

        $this->slug = Str::slug($this->title);
        $seed = random_int(1000, 10000);
        $this->image = "https://picsum.photos/seed/{$seed}/640/320";

        if ($this->status === ListingStatus::Active->value)
        {
            $this->published_at = now();
        }

        Listing::create($this->all());
    }

    private static function getValidationRules(int $status): array {
        return match ($status) {
            ListingStatus::Draft->value => ListingForm::draftRules(),
            ListingStatus::Active->value => ListingForm::activeRules(),
            default => []
        };
    }

    private static function draftRules(): array
    {
        return  [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    private static function activeRules(): array
    {
        $activeRules = ListingForm::draftRules();
        $activeRules['price'] = 'required|numeric';
        return $activeRules;
    }
}
