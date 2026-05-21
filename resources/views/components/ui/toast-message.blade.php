<div x-data="toast(
    '{{ session('toast_message') }}',
    '{{ session('toast_type', 'success') }}'
)"
     x-on:toast.window="handleEvent($event)"
     x-show="show"
     x-transition.opacity
     x-transition.opacity:enter.duration.500ms
     x-transition.opacity:leave.duration.1000ms
     class="toast">
    <div class="p-3 border-l-3 rounded-sm transition duration-1000"
         :class="getColor()">
        <span class="text-xl"
              x-text="message"></span>
    </div>
</div>
