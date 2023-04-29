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
    Route::prefix('register')->as('register:')->group(
        base_path('routes/web/registration.php'),
    );
    Route::post('logout', SubmitController::class)->name('logout');
});
