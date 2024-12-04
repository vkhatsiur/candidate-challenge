<div class="container mx-auto pt-16 w-8/12 md:w-6/12">
    <x-forms.form class="space-y-8">
        <div>
            <x-forms.lable name="title" label="Title" />
            <x-forms.input wire:model="form.title" id="title" name="title" type="text" />
            <div>
                @error('form.title') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <x-forms.lable name="description" label="Description" />
            <x-forms.textarea wire:model="form.description" id="description" name="description" type="text" class="h-24" />
            <div>
                @error('form.description') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <x-forms.lable name="category" label="Category" />
            <x-forms.select id="category" name="category" type="text" >
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">
                        {{ $category['name'] }}
                    </option>
                @endforeach
            </x-forms.select>
        </div>
        <div>
            <div class="flex space-x-4">
                <div class="w-full">
                    <x-forms.lable name="price" label="Price" />
                    <x-forms.input wire:model="form.price" id="price" name="price" type="number" />
                    <div>
                        @error('form.price') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <x-forms.lable name="currency" label="Currency" />
                    <x-forms.select wire:model="form.currency" id="currency" name="currency" type="text" >
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->value }}">
                                {{ $currency->value }}
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>
            </div>
        </div>
        <div class="flex justify-end space-x-2 text-sm">
            <x-forms.button class="px-4" type="button" wire:click="save">Save</x-forms.button>
            <x-forms.button class="px-4" type="button" wire:click="publish">Publish</x-forms.button>
        </div>
    </x-forms.form>
</div>
