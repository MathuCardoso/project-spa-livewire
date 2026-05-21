<?php

use Livewire\Component;

new class extends Component {
    public function getTasksProperty()
    {
        return auth()->user()->tasks()->where('status', 'doing')->get();
    }
};
?>


<x-tasks.card :tasks="$this->tasks"
              name="Done"
              colorClass="bg-warning" />
