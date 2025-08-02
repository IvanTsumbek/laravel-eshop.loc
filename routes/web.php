<?php

use App\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Product\CategoryComponent;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/category/{slug}', CategoryComponent::class)->name('category');
Route::get('/product/{slug}', ProductComponent::class)->name('product');

Route::middleware('guest')->group(function () {
    Route::get('/register', App\Livewire\User\RegisterComponent::class)->name('register');
    Route::get('/login', App\Livewire\User\LoginComponent::class)->name('login');
});
