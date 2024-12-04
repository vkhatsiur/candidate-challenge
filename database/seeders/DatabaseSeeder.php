<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Listing;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Category::factory()->createMany([
            ['name' => 'Furniture', 'slug' => 'furniture', 'logo' => 'furniture.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Electronics', 'slug' => 'electronics', 'logo' => 'electronics.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cars', 'slug' => 'cars', 'logo' => 'cars.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Property', 'slug' => 'property', 'logo' => 'property.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);

        Listing::factory(100)->create();
    }
}
