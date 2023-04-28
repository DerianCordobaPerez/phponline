<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Auth\Login;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

final class ViewController
{
    public function __invoke(Request $request): ViewContract
    {
        return View::make(
            view: 'auth.login',
            data: [
                'canResetPassword' => Route::has('password.request'),
                'status' => session('status'),
            ]
        );
    }
}
