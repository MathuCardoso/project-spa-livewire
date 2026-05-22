<?php

use App\Models\Task;
use App\Traits\WithToast;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component {
    use WithToast;
    protected $listeners = [
        'task-created' => '$refresh',
        'task-deleted' => '$refresh',
        'task-status-updated' => '$refresh',
    ];
    #[Validate('required')]
    public string $title = '';

    public string $description = '';

    public function saveTask()
    {
        $this->validate();

        auth()
            ->user()
            ->tasks()
            ->create([
                'title' => $this->title,
                'description' => $this->description,
            ]);

        $this->reset();
        $this->dispatch('task-created');
        $this->dispatchToast('Task criada com sucesso!');
    }
};
?>

<div class="min-h-screen bg-base-200 p-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-4xl font-bold">Dashboard</h1>
            <p class="text-base-content/70 mt-1">
                Gerencie suas tasks de forma simples
            </p>
        </div>

        <x-ui.modal text="Nova Task"
                    class="btn btn-primary">
            <x-form.form wire:submit="saveTask"
                         class="space-y-4">

                <x-form.input wire:model="title"
                              name="title"
                              label="Título"
                              placeholder="Título da task"
                              type="text" />
                <x-form.error-message name="title" />

                <x-form.input wire:model="description"
                              name="description"
                              label="Descrição"
                              placeholder="Descrição da task"
                              type="text" />

                <div class="pt-2">
                    <x-form.btn-submit />
                </div>

            </x-form.form>
        </x-ui.modal>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 px-4">

        <!-- TODO -->
        @livewire('tasks.todo')

        <!-- DOING -->
        @livewire('tasks.doing')

        <!-- DONE -->
        @livewire('tasks.done')
    </div>

</div>
