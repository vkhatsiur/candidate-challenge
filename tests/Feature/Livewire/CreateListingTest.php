<?php

namespace Livewire;

use App\Enums\Currency;
use App\Enums\ListingStatus;
use App\Livewire\CreateListing;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateListingTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_sets_default_values_on_mount()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $categories = Category::all();
        $currencies = Currency::cases();

        Livewire::test(CreateListing::class)
            ->assertSet('form.category_id', $categories->first()->id)
            ->assertSet('form.currency', $currencies[0]->value);
    }

    /** @test */
    public function it_can_save_a_draft_listing()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::inRandomOrder()->first();

        Livewire::test(CreateListing::class)
            ->set('form.title', 'Test Listing')
            ->set('form.description', 'This is a test description.')
            ->set('form.price', 100.50)
            ->set('form.currency', Currency::USD->value)
            ->set('form.category_id', $category->id)
            ->call('save')
            ->assertRedirect(route('home'));

        $this->assertDatabaseHas('listings', [
            'title' => 'Test Listing',
            'description' => 'This is a test description.',
            'price' => 100.50,
            'currency' => Currency::USD->value,
            'category_id' => $category->id,
            'status' => ListingStatus::Draft->value,
            'user_id' => $user->id,
        ]);
    }

    /** @test */
    public function it_can_publish_a_listing()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::inRandomOrder()->first();

        Livewire::test(CreateListing::class)
            ->set('form.title', 'Published Listing')
            ->set('form.description', 'This is a published description.')
            ->set('form.price', 200.75)
            ->set('form.currency', Currency::USD->value)
            ->set('form.category_id', $category->id)
            ->call('publish')
            ->assertRedirect(route('home'));

        $this->assertDatabaseHas('listings', [
            'title' => 'Published Listing',
            'description' => 'This is a published description.',
            'price' => 200.75,
            'currency' => Currency::USD->value,
            'category_id' => $category->id,
            'status' => ListingStatus::Active->value,
            'user_id' => $user->id,
            'published_at' => now(),
        ]);
    }
}
