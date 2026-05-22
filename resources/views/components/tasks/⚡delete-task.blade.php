<?php

use Livewire\Component;
use App\Traits\WithToast;

new class extends Component {
    use WithToast;
    public $taskId;
    protected $listeners = [
        'task-created' => '$refresh',
        'task-deleted' => '$refresh',
        'task-status-updated' => '$refresh',
    ];
    public function delete()
    {
        $task = Auth::user()->tasks()->find($this->taskId);

        if (!$task) {
            $this->dispatchToast('ERRO ao excluir task.', 'error');
            return;
        }

        $task->delete();
        $this->dispatch('task-deleted');
        $this->dispatchToast('Task excluída com sucesso!');
        $this->reset('taskId');
    }
};
?>

<button wire:click="delete()"
        data-tip="EXCLUIR Task"
        class="tooltip tooltip-error bg-error w-3 h-3 rounded-full cursor-pointer">
</button>
