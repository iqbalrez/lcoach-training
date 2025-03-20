@props([
    'id' => '#',
    'name' => '',
    'label' => '',
    'required' => false,
    'value' => '',
    'help' => '',
])

<div class="mb-4">
    <label class="mb-1 text-sm font-medium text-gray-500 flex justify-between" for="{{ $id }}">
        <div>
            {{ $label }} {!! $required ? '<span class="text-red-500">*</span>' : '' !!}
        </div>
            @if ($help)
            <span class="text-gray-500 text-sm mt-1 text-end" id="{{ $id }}_help"> {{ $help }}</span>
        @endif
    </label>
    <input @if ($required) required @endif value="{{ $value }}"
        class="cursor-pointer text-sm block mt-1 w-full bg-gray-50 border border-gray-300 focus:ring-gray-500 focus:border-gray-500 rounded-md shadow-sm @if ($value != '') mb-2 @endif"
        id="{{ $id }}" name="{{ $name }}" type="file">


    @error($name)
        <p class="text-primary-red text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
