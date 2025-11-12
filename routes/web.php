<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('boycott.products.index');
Route::get('/companies/{company}', [CompaniesController::class, 'show'])->name('boycott.companies.show');
