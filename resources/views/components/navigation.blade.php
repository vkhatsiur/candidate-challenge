<nav class="bg-teal-950 text-white">
    <div class="flex justify-items-stretch">
        <div class="flex-none justify-self-center p-5 pr-2">
            <a href="{{ route('home') }}">
                <p class="flex h-8 items-center justify-center">Home</p>
            </a>
        </div>
        <div class="flex-auto py-5 pl-5">
            @livewire('search-bar')
        </div>
        <div class="flex-none justify-self-center p-5">
            <div class="flex space-x-4">
                @auth
                    <a href="{{ route('listings.create') }}"
                       class="bg-purple-800 h-8 hover:bg-purple-700 active:bg-purple-600 rounded">
                        <p class="flex items-center justify-center h-full text-xl font-semibold w-8">+</p>
                    </a>

                    <form method="POST" action="{{ route('sign-out') }}">
                        @csrf
                        @method('DELETE')

                        <button class="flex h-8 items-center justify-center">Sign Out</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}">
                        <p class="flex h-8 items-center justify-center">Sign In</p>
                    </a>
                    <a href="{{ route('create-sign-up') }}">
                        <p class="flex h-8 items-center justify-center">Sign Up</p>
                    </a>
                @endguest
            </div>
        </div>
    </div>
</nav>
