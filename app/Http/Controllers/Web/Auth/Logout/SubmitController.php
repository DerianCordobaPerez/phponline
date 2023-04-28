<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Auth\Logout;

use App\Http\Controllers\Web\Static\HomeController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class SubmitController
{
    public function __invoke(Request $request): RedirectResponse
    {
        Auth::logout();

        return new RedirectResponse(
            url: action(HomeController::class),
        );
    }
}
