@props([
    'action' => '',
    'method' => 'POST',
    'class' => 'h-full',
])

<form @class([$class])
      method="{{ $method }}"
      @if ($action) action="{{ $action }}" @endif
      {{ $attributes }}>

    {{ $slot }}

    @method($method)
    @csrf
</form>
