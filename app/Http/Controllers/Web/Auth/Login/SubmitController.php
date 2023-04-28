<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Auth\Login;

use App\Http\Controllers\Web\Static\HomeController;
use App\Http\Requests\Web\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;

final class SubmitController
{
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        return new RedirectResponse(
            url: action(HomeController::class),
        );
    }
}
