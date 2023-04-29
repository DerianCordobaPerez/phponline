<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Sources;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Infrastructure\Content\Queries\FetchUserSourcesContract;

final readonly class ViewController
{
    public function __construct(
        private Authenticatable $user,
        private FetchUserSourcesContract $query,
    ) {}

    public function __invoke(Request $request): ViewContract
    {
        return View::make(
            view: 'sources.view',
            data: [
                'sources' => $this->query->handle(
                    user: strval($this->user->getAuthIdentifier()),
                ),
            ],
        );
    }
}
