<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('boycott.home.index');
Route::get('/companies/{company}', [CompaniesController::class, 'show'])->name('boycott.companies.show');
