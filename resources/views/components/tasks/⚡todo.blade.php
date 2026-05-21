<?php

use Livewire\Component;

new class extends Component {
    protected $listeners = ['task-created', '$refresh'];
    public function getTasksProperty()
    {
        return auth()->user()->tasks()->where('status', 'todo')->latest()->get();
    }
};
?>

<x-tasks.card :tasks="$this->tasks"
              name="Todo" />
