<x-layouts.app>

    <div class="flex justify-center px-6 pt-2">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-14 border-b-2 border-teal-950">
            @foreach($categories as $category)
                <a href="{{ route('search', ['category' => $category->name]) }}">
                    <img class="h-20 w-20 bg-yellow-400 rounded-full" src="{{ $category->logo }}" alt="Surge Logo" />
                    <p class="text-lg font-medium text-center">{{ $category->name }}</p>
                </a>
            @endforeach
        </div>
    </div>

    <div class="px-6 pt-6">
        <p class="text-2xl font-semibold pl-4">Top Listings</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
            @foreach($topListings as $topListing)
                <div class="p-4">
                    <a href="{{ route('listing', $topListing) }}">
                        <div class="bg-gray-200 rounded-lg">
                            <img class="w-full min-h-56 max-h-56 object-cover object-center rounded-t-lg" src="{{ "https://picsum.photos/seed/{$topListing->id}/640/320" }}" alt="car"/>
                            <div class="flex flex-col space-y-2 pl-4 pt-4 pb-4">
                                <p class="text-lg truncate ...">{{ $topListing->title }}</p>
                                <p class="text-xl font-semibold">{{ $topListing->priceFormatted() }}</p>
                                <p class="text-xs">{{ $topListing->published_at->toFormattedDateString() }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</x-layouts.app>
