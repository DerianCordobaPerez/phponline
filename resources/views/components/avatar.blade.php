@props([
    'src',
    'name',
])

<img
    class="inline-block h-8 w-8 rounded-md"
    src="{{ $src }}"
    alt="Avatar of {{ $name }}"
/>
