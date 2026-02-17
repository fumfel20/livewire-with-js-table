<?php

use App\Livewire\Reports\ActiveOrders;
use App\Livewire\Reports\InactiveOrders;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('active-orders', [ActiveOrders::class, '__invoke'])->name('active-orders');
Route::get('inactive-orders', [InactiveOrders::class, '__invoke'])->name('inactive-orders');
