<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SearchBar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(SearchBar::class)
            ->assertStatus(200);
    }
}
