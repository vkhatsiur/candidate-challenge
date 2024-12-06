<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class TestsSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(4)->create();
    }
}
