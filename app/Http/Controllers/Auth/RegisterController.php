<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller {
    public function index() {
        return view('auth.register');
    }

    // public function store(RegisterRequest $request) {
    //     $fieldsValidated = $request->validated();

    //     User::save($fieldsValidated);

    //     return redirect()
    //         ->route('login')
    //         ->with('success', 'Conta criada com sucesso!');
    // }
}
