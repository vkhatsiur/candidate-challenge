<x-layouts.app>

    <div class="flex justify-center px-6 pt-2">
        <div class="flex flex-row space-x-20 border-b-2 border-teal-950">
            @foreach($categories as $category)
                <div>
                    <img class="h-20 w-20 bg-yellow-400 rounded-full" src="{{ $category->logo }}" alt="Surge Logo" />
                    <p class="text-lg font-medium text-center">{{ $category->name }}</p>
                </div>
            @endforeach
        </div>
    </div>



</x-layouts.app>
