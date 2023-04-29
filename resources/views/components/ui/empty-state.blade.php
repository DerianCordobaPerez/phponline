@props(['heading', 'message'])

<div class="text-center py-4">
    <h3 class="mt-2 text-sm font-semibold text-gray-900">
        {{ $heading }}
    </h3>
    <p class="mt-1 text-sm text-gray-500">
        {{ $message }}
    </p>
    <div class="py-6">
        {{ $slot }}
    </div>
</div>
