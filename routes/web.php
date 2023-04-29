<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Auth\Logout\SubmitController;
use Illuminate\Support\Facades\Route;

Route::as('static:')->group(
    base_path('routes/web/static.php'),
);

Route::prefix('auth')->as('auth:')->group(static function (): void {
    Route::middleware(['guest'])->prefix('login')->as('login:')->group(
        base_path('routes/web/login.php'),
    );
    Route::middleware(['guest'])->prefix('register')->as('register:')->group(
        base_path('routes/web/registration.php'),
    );
    Route::middleware(['auth'])->group(static function (): void {
        Route::post('logout', SubmitController::class)->name('logout');
    });
});

Route::middleware(['auth'])->group(static function (): void {
    Route::prefix('sources')->as('sources:')->group(
        base_path('routes/web/sources.php'),
    );
});
