@props([
    'name' => null,
    'type' => 'text',
    'label' => null,
    'placeholder' => null,
    'icons' => [
        'first_name' => 'user',
        'last_name' => 'user',
        'username' => 'user',
        'email' => 'email',
        'password' => 'key',
    ],
])

<div class="mt-4"
     @if ($type === 'password') x-data="{ showPassword: false }" @endif>
    @if ($label)
        <label class="label pb-1"
               for="{{ $name }}">
            <span class="font-medium text-sm">{{ $label }}</span>
        </label>
    @endif
    <div @class([
        'input w-full focus-within:input-primary',
        'input-error' => $errors->has($name),
        'input-success' => !$errors->has($name) && $errors->any(),
    ])>
        @if (isset($icons[$name]) && $icons[$name])
            <label for="{{ $name }}"
                   class="border-r border-primary pr-2">
                <x-dynamic-component :component="'icons.' . $icons[$name]" />
            </label>
        @endif
        <input wire:model="{{ $name }}"
               @if ($type === 'password') :type="showPassword ? 'text' : 'password'"
                @else
                    type="{{ $type }}" @endif
               x-data="input('{{ $name }}')"
               @input="formatName($event)"
               placeholder="{{ $placeholder }}"
               id="{{ $name }}"
               {{ $attributes }}>
        @if ($type == 'password')
            <div @click="showPassword = !showPassword">
                <div x-show="!showPassword">
                    <x-icons.eye />
                </div>
                <div x-show="showPassword"
                     style="display: none">
                    <x-icons.eye-closed />
                </div>
            </div>
        @endif
    </div>
</div>
