<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Auth\Registration\SubmitController;
use App\Http\Controllers\Web\Auth\Registration\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', ViewController::class)->name('view');
Route::post('/', SubmitController::class)->name('submit');
