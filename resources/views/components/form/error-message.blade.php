@props([
    'name' => null,
])

@error($name)
    <span class="text-red-600 text-sm">
        {{ $message }}
    </span>
@enderror
