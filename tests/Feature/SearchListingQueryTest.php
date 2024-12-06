<?php

namespace Tests\Feature;

use App\Enums\ListingStatus;
use App\Models\Category;
use App\Models\Listing;
use App\Queries\SearchListingQuery;
use App\Queries\SearchListingQueryHandler;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SearchListingQueryTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function it_no_filters()
    {
        Listing::factory(10)->create(['status' => ListingStatus::Active->value]);

        $searchQuery = SearchListingQuery::create();
        $handler = new SearchListingQueryHandler();
        $result = $handler->handle($searchQuery);

        $this->assertEquals(10, $result->total());
    }

    #[Test]
    public function it_category_filter()
    {
        $electronicsCategory = Category::factory()->create(['slug' => 'electronics']);
        $carCategory = Category::factory()->create(['slug' => 'cars']);
        Listing::factory()->create(['title' => 'Electronics 1 Listing', 'category_id' => $electronicsCategory->id, 'status' => ListingStatus::Active->value]);
        Listing::factory()->create(['title' => 'Electronics 2 Listing', 'category_id' => $electronicsCategory->id, 'status' => ListingStatus::Active->value]);
        Listing::factory()->create(['title' => 'Other Listing', 'category_id' => $carCategory->id, 'status' => ListingStatus::Draft->value]);

        $searchQuery = SearchListingQuery::create(category: 'electronics');
        $handler = new SearchListingQueryHandler();

        $result = $handler->handle($searchQuery);

        $this->assertEquals(2, $result->total());
    }

    #[Test]
    public function it_search_query_filter()
    {
        Listing::factory()->create(['title' => 'Sample Listing', 'status' => ListingStatus::Active->value]);
        Listing::factory()->create(['title' => 'Searchable Listing', 'status' => ListingStatus::Active->value]);
        Listing::factory()->create(['title' => 'Unknown Listing', 'status' => ListingStatus::Active->value]);

        $searchQuery = SearchListingQuery::create(query: 'Searchable');
        $handler = new SearchListingQueryHandler();

        $result = $handler->handle($searchQuery);

        $this->assertEquals(1, $result->total());
    }

    public function test_no_results_found()
    {
        Listing::factory()->create(['title' => 'Sample Listing']);
        Listing::factory()->create(['title' => 'Another Listing']);

        $searchQuery = SearchListingQuery::create(query: 'Non-existent');
        $handler = new SearchListingQueryHandler();

        $result = $handler->handle($searchQuery);

        $this->assertEquals(0, $result->total());
    }
}
