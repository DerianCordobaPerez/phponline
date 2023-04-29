<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Sources;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

final class CreateViewController
{
    public function __invoke(Request $request): ViewContract
    {
        return View::make(
            view: 'sources.create',
        );
    }
}
