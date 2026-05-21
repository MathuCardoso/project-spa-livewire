<?php

use Illuminate\Support\Facades\Route;

/* AUTENTICAÇÕES */
Route::view('/cadastro', 'auth.register')->name('cadastro');
Route::view('/login', 'auth.login')->name('login');

/* NECESSÁRIO AUTENTICAÇÃO! */
Route::middleware('auth')->group(function () {
    Route::view('/', 'home')->name('dashboard');
});
