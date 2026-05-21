@props([
    'name' => null,
    'type' => 'text',
    'class' => 'w-full focus:input-primary',
    'label' => null,
    'placeholder' => null,
    'icons' => [
        'username' => null,
        'email' => 'email',
        'password' => 'key',
    ],
])

@php

@endphp

<div class="mt-4">
    @if ($label)
        <label class="label pb-1"
               for="{{ $name }}">
            <span class="font-medium text-sm">{{ $label }}</span>
        </label>
    @endif
    <div class="input w-full">
        @if (isset($icons[$name]) && $icons[$name])
        <label class="border-r border-primary pr-2">
            <x-dynamic-component :component="'icons.' . $icons[$name]" />
        </label>
        @endif
        <input name="{{ $name }}"
               type="{{ $type }}"
               placeholder="{{ $placeholder }}"
               id="{{ $name }}"
               @class([
                   $class,
                   'border-invalid' => $errors->has($name),
                   'border-valid' => !$errors->has($name) && $errors->any(),
               ])
               {{ $attributes }}>
    </div>
</div>
