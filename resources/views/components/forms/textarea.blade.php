@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-purple-800 sm:text-sm/6',
        'value' => old($name)
    ];
@endphp

<textarea  {{ $attributes($defaults) }}></textarea>
