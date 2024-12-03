<div class="container mx-auto pt-16 w-5/12">
    <x-forms.form wire:submit="save" class="space-y-8">
        <div>
            <x-forms.lable name="title" label="Title" />
            <x-forms.input wire:model="form.title" id="title" name="title" type="text" />
        </div>
        <div>
            <x-forms.lable name="description" label="Description" />
            <x-forms.textarea wire:model="form.description" id="description" name="description" type="text" class="h-24" />
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
        <div class="flex justify-end">
            <x-forms.button class="text-sm text-white px-4" type="submit">Save</x-forms.button>
        </div>
    </x-forms.form>
</div>
