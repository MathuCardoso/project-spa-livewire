@props([
    'text' => 'Abrir Modal',
    'class' => 'btn',
])

<div class="z-50">
    <label for="open_modal"
           @class([$class])>
        {{ $text }}
    </label>

    <input type="checkbox"
           id="open_modal"
           class="modal-toggle" />
    <dialog class="modal backdrop-blur">
        <div class="modal-box">

            {{ $slot }}

        </div>
        <label class="modal-backdrop"
               for="open_modal">Close</label>
    </dialog>
</div>
