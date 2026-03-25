<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class)
    ->middleware('guest')
    ->name('login');
Route::get('/', \App\Livewire\SprintDecision::class)->name('home');

