<?php

namespace Database\Factories;

use App\Enums\ListingStatus;
use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ListingFactory extends Factory
{
    protected $model = Listing::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->words(5, true),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->randomElement(ListingStatus::cases())->value,
            'description' => $this->faker->text(800),
            'published_at' => Carbon::now(),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomNumber(),
            'currency' => $this->faker->randomElement(['USD', 'EUR']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Listing $listing) {
            $listing->image = "https://picsum.photos/seed/{$listing->id}/640/320";
            $listing->save();
        });
    }
}
