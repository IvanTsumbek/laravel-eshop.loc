<?php

use App\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Product\CategoryComponent;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/category/{slug}', CategoryComponent::class)->name('category');
Route::get('/product', ProductComponent::class)->name('product');

