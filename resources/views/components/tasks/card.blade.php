@props([
    'tasks' => [],
    'name' => null,
    'placeholder' => null,
    'colorClass' => 'bg-black',
])


<div class="bg-base-100 rounded-2xl shadow-md border border-base-300 p-5 h-fit">
    <div class="flex items-center justify-between mb-5">
        <h2 class="font-bold text-xl">
            {{ $name }}
        </h2>

        <div class="badge font-bold {{ $colorClass }}">
            {{ $placeholder }}
        </div>
    </div>
    @foreach ($tasks as $t)
        <div
             class="group bg-base-200 border border-base-300 rounded-xl p-4 shadow-sm hover:shadow-md hover:scale-101 transition-all duration-200 my-4 relative">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="font-semibold text-lg">
                        {{ $t->title }}
                    </h3>

                    <p class="text-sm text-base-content/70 mt-1">
                        {{ $t->description }}
                    </p>
                </div>
            </div>
            <div class="opacity-0 group-hover:opacity-100 absolute right-3 top-1 gap-2 font-bold transition">
                @livewire('tasks.change-status', ['taskId' => $t->id, 'currentStatus' => $t->status], 'status-' . $t->id)
                @livewire('tasks.delete-task', ['taskId' => $t->id], 'delete-' . $t->id)
            </div>
        </div>
    @endforeach
</div>
