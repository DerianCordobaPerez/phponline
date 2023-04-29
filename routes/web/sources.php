<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Sources\CreateViewController;
use App\Http\Controllers\Web\Sources\StoreController;
use App\Http\Controllers\Web\Sources\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', ViewController::class)->name('view');
Route::get('create', CreateViewController::class)->name('create');
Route::post('/', StoreController::class)->name('store');
