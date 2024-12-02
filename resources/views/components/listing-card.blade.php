@props(['listing'])

<div {{ $attributes(['class' => 'p-4']) }}>
    <a href="{{ route('listing', $listing) }}">
        <div class="bg-gray-200 rounded-lg">
            <img class="w-full min-h-56 max-h-56 object-cover object-center rounded-t-lg" src="{{ $listing->image }}" alt="car"/>
            <div class="flex flex-col space-y-2 pl-4 pt-4 pb-4">
                <p class="text-lg truncate ...">{{ $listing->title }}</p>
                <p class="text-xl font-semibold">{{ $listing->priceFormatted() }}</p>
                <p class="text-xs">{{ $listing->published_at->toFormattedDateString() }}</p>
            </div>
        </div>
    </a>
</div>
