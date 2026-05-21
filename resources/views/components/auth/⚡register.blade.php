<?php

use App\Traits\WithToast;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component {
    use WithToast;
    #[Validate('required|max:30|alpha_dash')]
    public $username = '';
    #[Validate('required|max:255|email|unique:users')]
    public $email = '';
    #[Validate('required|min:6|max:64')]
    public $password = '';

    public function save()
    {
        $validatedFields = $this->validate();

        User::create($validatedFields);

        $this->toast('Conta criada com sucesso!', 'success');

        return $this->redirect('/login', navigate: true);
    }
};
?>

<x-form.form method="POST"
             wire:submit="save"
             class="w-full max-w-120 rounded-2xl p-8 shadow-xl border border-base-200">

    <h2 class="text-2xl font-bold text-center mb-6">Criar Conta</h2>

    <x-form.input wire:model="username"
                  name="username"
                  label="Nome de Usuário"
                  placeholder="Usuario123"
                  type="text" />
    <x-form.error-message name="username" />

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
        <a href="{{ route('login') }}"
           wire:navigate
           class="text-sm text-primary hover:underline">
            Já possui uma conta? Entrar
        </a>
    </div>

</x-form.form>
