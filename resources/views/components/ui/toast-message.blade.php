<div x-cloak x-data="toast(
    '{{ session('toast_message') }}',
    '{{ session('toast_type', 'success') }}'
)"
     x-on:toast.window="handleEvent($event)"
     x-show="show"
     x-transition.opacity
     x-transition.opacity:enter.duration.500ms
     x-transition.opacity:leave.duration.1000ms
     class="toast z-100">
    <div class="p-3 border-r-3 border-b-3 rounded-xl transition duration-1000 shadow-xl"
         :class="{
             'border-success': type == 'success',
             'border-error': type == 'error',
             'border-warning': type == 'warning'
         }">
        <span class="text-xl"
              x-text="message"></span>
    </div>
</div>
