<x-layouts.app>
    <div class="container mx-auto pt-8 px-4">
        <p class="text-2xl font-semibold pl-4">Search Results</p>
        <div>
            @foreach($listings as $listing)
                <x-listing-card-wide :listing="$listing" class="hidden sm:block"/>
                <x-listing-card :listing="$listing" class="block sm:hidden" />
            @endforeach
        </div>
    </div>
</x-layouts.app>
