<x-layouts.app>
    <div class="container mx-auto mt-16 w-8/12 md:w-6/12 border border-gray-200 rounded bg-gray-100">
        <x-forms.form class="flex flex-col mt-16 p-8 pt-0 space-y-8" method="POST" action="{{ route('store-sign-up') }}">
            <h1 class="font-bold text-center text-4xl mb-8">Sign up</h1>
            <div>
                <x-forms.lable name="name" label="Name" />
                <x-forms.input name="name" required/>
                <div>
                    @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <x-forms.lable name="email" label="Email" />
                <x-forms.input name="email" type="email" required/>
                <div>
                    @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <x-forms.lable name="phone" label="Phone" />
                <x-forms.input type="tel" id="phone" name="phone" required/>
                <div>
                    @error('phone') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <x-forms.lable name="password" label="Password" />
                <x-forms.input name="password" type="password" required/>
                <div>
                    @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <x-forms.lable name="password_confirmation" label="Password Confirmation" />
                <x-forms.input name="password_confirmation" type="password" required/>
            </div>

            <x-forms.button>Sign Up</x-forms.button>
        </x-forms.form>
    </div>
</x-layouts.app>
