<?php

use Livewire\Component;
use App\Traits\WithToast;
use Livewire\Attributes\Renderless;

new class extends Component {
    use WithToast;
    public int $taskId;
    public array $statusList = [
        'todo' => ['bg-black', 'tooltip-black', 'A fazer'],
        'doing' => ['bg-warning', 'tooltip-warning', 'Fazendo'],
        'done' => ['bg-success', 'tooltip-success', 'Feito'],
    ];
    public string $currentStatus = '';

    #[Renderless]
    public function updateStatus(string $newStatus)
    {
        $task = Auth::user()->tasks()->find($this->taskId);

        if (!$task) {
            $this->dispatchToast('Erro inesperado.', 'error');
            return;
        }

        $task->update(['status' => $newStatus]);
        $this->dispatch('task-status-updated');
        $this->dispatchToast('Task atualizada com sucesso!');
        $this->skipRender();
    }
};
?>

<div class="flex gap-2">
    @foreach ($this->statusList as $key => $status)
        @if ($key !== $currentStatus)
            <button wire:click="updateStatus('{{ $key }}')"
                    data-tip="Mover para {{ $status[2] }}"
                    class="tooltip {{ $status[0] . ' ' . $status[1] }} w-3 h-3 rounded-full cursor-pointer">
            </button>
        @endif
    @endforeach
</div>
