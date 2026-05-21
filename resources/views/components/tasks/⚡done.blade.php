<?php

use Livewire\Component;

new class extends Component {
    public function getTasksProperty()
    {
        return auth()->user()->tasks()->where('status', 'done')->latest()->get();
    }
};
?>

<x-tasks.card :tasks="$this->tasks"
              name="Done"
              colorClass="bg-success" />
