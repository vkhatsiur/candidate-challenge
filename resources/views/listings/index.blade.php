<x-layouts.app>
    <div class="container mx-auto pt-8 px-4">
        <div class="items-center mb-8">
            <div>
                <div class="flex space-x-4">
                    <h1 class="text-4xl font-bold ">{{ $listing->title }}</h1>
                    @if(auth()->user()?->id === $listing->user_id)
                        <form method="POST" action="{{ route('destroy-listing', $listing) }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-xl font-bold text-red-600">remove</button>
                        </form>
                    @endif
                </div>
                <p class="text-lg text-gray-600">{{ $listing->category->name }}</p>
                <p class="text-sm text-gray-500">Posted {{ $listing->published_at->diffForHumans() }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 min-h-[400px]">
            <div class="col-span-1 md:col-span-2 flex justify-center items-center">
                <div class="aspect-w-16 aspect-h-9 w-full max-w-3xl">
                    <img src="{{ "https://picsum.photos/seed/{$listing->id}/640/320" }}" alt="{{ $listing->title }}" class="w-full max-h-[400px] object-cover rounded-lg shadow-lg">
                </div>
            </div>

            <div class="col-span-1">
                <div>
                    <p class="text-2xl font-bold text-teal-600">{{ $listing->priceFormatted() }}</p>
                    <p class="text-lg text-gray-500">Seller: {{ $listing->user->name }}</p>
                </div>

                <h2 class="text-2xl font-semibold">Contact Information</h2>
                <div class="mt-4 text-gray-600">
                    <p>Seller: <strong>{{ $listing->user->name }}</strong></p>
                    <p>Phone: <strong>{{ $listing->user->phone }}</strong></p>
                    <p>Email: <strong>{{ $listing->user->email }}</strong></p>
                </div>
            </div>
        </div>

        @if($listing->description)
            <div class="mt-8">
                <h2 class="text-2xl font-semibold text-gray-800">Description</h2>
                <p class="text-gray-600 mt-4">{{ $listing->description }}</p>
            </div>
        @endif
    </div>
</x-layouts.app>
