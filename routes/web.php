<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('boycott.home.index');
Route::get('/donate', [SiteController::class, 'show_donate'])->name('boycott.home.index');
Route::get('/companies/{company}', [CompaniesController::class, 'show'])->name('boycott.companies.show');
