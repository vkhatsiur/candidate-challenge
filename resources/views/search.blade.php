<x-layouts.app>
    @if($listings->isEmpty())
        <p class="flex center items-center justify-center w-full text-4xl font-semibold mt-16">
            No results
        </p>
    @else
        <div class="container mx-auto pt-8 px-4">
            <p class="text-2xl font-semibold pl-4">Search Results</p>
            <div>
                @foreach($listings as $listing)
                    <x-listing-card-wide :listing="$listing" class="hidden sm:block"/>
                    <x-listing-card :listing="$listing" class="block sm:hidden" />
                @endforeach
            </div>
            <div class="p-4">
                {{ $listings->links() }}
            </div>
        </div>
    @endif
</x-layouts.app>
