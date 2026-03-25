@props(['label', 'name'])

<div class="flex flex-col gap-1">

    <label for="name" class="text-sm font-medium text-gray-700">
        {{ $label }}
    </label>

        <input  {{ $attributes }}
            class=" mt-1 block w-full p-2 border-gray-300 rounded-md shadow outline-none border focus:border-blue-700"
        >

        @error($attributes->get('name'))
        <div class="text-red-500 text-sm mt-2">
            {{ $message }}
        </div>
        @enderror

</div>
