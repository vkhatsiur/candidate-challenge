<nav class="bg-teal-950 text-white">
    <div class="flex justify-items-stretch">
        <div class="flex-auto py-5 pl-5">
           @livewire('search-bar', ['query' => request()->query('query')])
        </div>
        <div class="flex-none justify-self-center p-5">
            <div class="flex space-x-4">
                <a href="{{ route('listings.create') }}" class="bg-purple-800 h-8 hover:bg-purple-700 active:bg-purple-600 rounded">
                    <p class="flex items-center justify-center h-full text-xl font-semibold w-8">+</p>
                </a>
{{--                TODO--}}
                <div>Sign In</div>
                <div>Sign Up</div>
            </div>
        </div>
    </div>
</nav>
