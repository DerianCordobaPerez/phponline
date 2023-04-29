<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Sources;

use App\Http\Requests\Web\Sources\StoreRequest;
use Domains\Content\Processes\CreateNewSource;
use Domains\Content\Processes\Payloads\AddSourcePayload;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Throwable;

final class StoreController
{
    public function __construct(
        private readonly Authenticatable $user,
        private readonly CreateNewSource $process,
    ) {}


    public function __invoke(StoreRequest $request)
    {
        try {
            $this->process->run(
                payload: new AddSourcePayload(
                    user: strval($this->user->getAuthIdentifier()),
                    payload: $request->payload(),
                ),
            );
        } catch (Throwable $exception) {
            throw ValidationException::withMessages(
                messages: [
                    'name' => 'Something went wrong! ' . $exception->getMessage(),
                ],
            );
        }

        return new RedirectResponse(
            url: action(ViewController::class),
        );
    }
}
