@props([
    'text' => 'Abrir Modal',
    'class' => 'btn',
])

<label for="open_modal"
       @class([$class])>
       {{ $text }}
</label>

<input type="checkbox"
       id="open_modal"
       class="modal-toggle" />
<div class="modal backdrop-blur" role="dialog">
    <div class="modal-box">

        {{ $slot }}

    </div>
    <label class="modal-backdrop"
           for="open_modal">Close</label>
</div>
