<x-layouts.app>

    <div class="flex justify-center px-6 pt-2">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-14 border-b-2 border-teal-950">
            @foreach($categories as $category)
                <a href="{{ route('search', ['category' => $category->slug]) }}">
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
                <x-listing-card :listing="$topListing" />
            @endforeach
        </div>
    </div>

</x-layouts.app>
