@props(['listing'])

<div {{ $attributes(['class' => 'p-4']) }}>
    <a href="{{ route('listing', $listing) }}">
        <div class="bg-gray-200 rounded-lg">
            <div class="flex flex-row">
                <img class="w-52 h-52 object-cover object-center rounded-t-lg" src="{{ $listing->image }}" alt="car"/>
                <div class="flex flex-col space-y-2 pl-4 pt-4 pb-4">
                    <p class="text-xl font-bold truncate ...">{{ $listing->title }}</p>
                    <p class="line-clamp-3">{{ $listing->description }}</p>
                    <p class="text-xl font-semibold text-teal-600">{{ $listing->priceFormatted() }}</p>
                    <p class="text-xs">{{ $listing->published_at->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>
    </a>
</div>
