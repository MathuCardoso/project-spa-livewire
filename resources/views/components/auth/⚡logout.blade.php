<?php

use Livewire\Component;

new class extends Component {
    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        
        return $this->redirect('/login', navigate: true);
    }
};
?>

<li>
    <button wire:click="logout">
        Logout
    </button>
</li>
