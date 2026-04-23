<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Page\Admin\Sprint;
use App\Livewire\Page\Auth\Login;
use App\Livewire\Sprint\Show;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/login', Login::class)
    ->middleware('guest')
    ->name('login');


Route::get('/', \App\Livewire\SprintDecision::class)->name('home');
Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/admin/sprint', Sprint::class)
        ->middleware('can:isAdmin')
        ->name('admin.sprint');

    Route::get('/admin/sprint/{room}', Show::class)
        ->name('admin.sprint.show');
});


