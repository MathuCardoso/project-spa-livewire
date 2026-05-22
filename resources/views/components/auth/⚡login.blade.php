<?php

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Traits\WithToast;

new class extends Component {
    use WithToast;
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required')]
    public $password = '';

    public function save()
    {
        $validatedFields = $this->validate();

        if (!Auth::attempt($validatedFields)) {
            $this->dispatchToast('Credenciais Inválidas', 'error');
            return $this->reset();
        }

        session()->regenerate();
        return $this->redirect(route('dashboard'), navigate: true);
    }
};
?>

<x-form.form method="POST"
             wire:submit="save"
             class="w-full max-w-120 rounded-2xl p-8 shadow-xl border border-base-200">

    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

    <x-form.input wire:model="email"
                  name="email"
                  label="Email"
                  placeholder="seu@email.com"
                  type="email" />
    <x-form.error-message name="email" />


    <x-form.input wire:model="password"
                  name="password"
                  label="Senha"
                  placeholder="••••••••"
                  type="password" />
    <x-form.error-message name="password" />

    <div class="mt-2">
        <x-form.btn-submit content="Entrar" />
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('cadastro') }}"
           wire:navigate
           class="text-sm text-primary hover:underline">
            Não possui uma conta? Cadastre-se
        </a>
    </div>

</x-form.form>
