<?php

use App\Traits\WithToast;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component {
    use WithToast;
    #[Validate('required|max:20|alpha_dash')]
    public $first_name = '';
    #[Validate('required|max:20|alpha_dash')]
    public $last_name = '';
    #[Validate('required|max:30|alpha_dash|unique:users')]
    public $username = '';
    #[Validate('required|max:255|email|unique:users')]
    public $email = '';
    #[Validate('required|min:6|max:64')]
    public $password = '';

    public function save()
    {
        $validatedFields = $this->validate();

        User::create($validatedFields);

        $this->flashToast('Conta criada com sucesso!');

        return $this->redirect('/login', navigate: true);
    }
};
?>

<x-form.form method="POST"
             wire:submit="save"
             class="max-w-160 max-h-5/5 rounded-2xl p-8 py-3 shadow-xl border border-base-200">

    <h2 class="text-2xl font-bold text-center my-3">Criar Conta</h2>

    <div class="flex gap-4">
        <div class="flex-1">
            <x-form.input name="first_name"
                          label="Primeiro Nome"
                          placeholder="Ronaldinho"
                          type="text" />
            <x-form.error-message name="first_name" />
        </div>
        <div class="flex-1">
            <x-form.input name="last_name"
                          label="Sobrenome"
                          placeholder="Gaúcho"
                          type="text" />
            <x-form.error-message name="last_name" />
        </div>
    </div>

    <x-form.input name="username"
                  label="Nome de Usuário"
                  placeholder="Usuario123"
                  type="text"
                  autocomplete="username" />
    <x-form.error-message name="username" />

    <x-form.input name="email"
                  label="Email"
                  placeholder="seu@email.com"
                  type="email"
                  autocomplete="email" />
    <x-form.error-message name="email" />


    <x-form.input name="password"
                  label="Senha"
                  placeholder="••••••••"
                  type="password"
                  autocomplete="new-password" />
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
