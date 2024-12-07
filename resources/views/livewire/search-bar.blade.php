<div x-data="{ open: false }"
     @click.away="open = false">
    <form action="{{ route('search') }}">
        <div class="flex h-8">
            <input
                wire:model.live.debounce.500ms="query"
                name="query"
                type="text"
                class="w-9/12 text-gray-900 rounded-l border-b-0 focus:outline-none pl-2"
                placeholder="Search Listing"
                @input="open = $event.target.value.length > 0"
                @focus="open = $wire.query.length > 0"/>
            <x-forms.button class="text-sm rounded-r">Search</x-forms.button>
        </div>
    </form>
    <div class="relative text-black"
         x-show="open">
        <div class="absolute w-9/12 border-2 bg-white border-gray-900 mt-1">
            <div class="flex flex-col space-y-1 p-2">
                @forelse($results as $item)
                    <a href="{{ route('listing', ['listing'=> $item]) }}">
                        <div class="hover:bg-gray-300">
                            {{ $item->title }}
                        </div>
                    </a>
                @empty
                    <p>
                        No results
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
