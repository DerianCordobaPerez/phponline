<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Auth\Registration;

use App\Http\Controllers\Web\Static\HomeController;
use App\Http\Requests\Web\Auth\RegistrationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Accounts\Commands\CreateUserAccountContract;

final readonly class SubmitController
{
    public function __construct(
        private CreateUserAccountContract $command,
    ) {
    }

    public function __invoke(RegistrationRequest $request): RedirectResponse
    {
        $user = $this->command->handle(
            payload: $request->payload(),
        );

        Auth::login($user);

        return new RedirectResponse(
            url: action(HomeController::class),
        );
    }
}
