<?php

use App\Livewire\Ticket\Create;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('tickets/create', Create::class)
    ->name('tickets.create');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
require __DIR__.'/auth.php';
