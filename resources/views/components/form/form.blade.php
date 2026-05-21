@props([
    'action' => '',
    'method' => 'POST',
    'class' => null,
])

<form @class([$class])
      method="{{ $method }}"
      @if ($action) action="{{ $action }}" @endif
      {{ $attributes }}>

    {{ $slot }}

    @method($method)
    @csrf
</form>
