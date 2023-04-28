<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Static;

use App\Http\Resources\Web\ArticleResource;
use Domains\Content\Enums\Status;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Infrastructure\Content\Queries\FetchArticlesContract;

final class HomeController
{
    public function __construct(
        private FetchArticlesContract $query,
    ) {}

    public function __invoke(Request $request): ViewContract
    {
        return View::make(
            view: 'static.home',
            data: [
                'articles' => ArticleResource::collection(
                    resource: $this->query->handle(
                        status: Status::PUBLISHED,
                    )->with(['user.company', 'user.jobTitle'])->take(6)->get(),
                ),
            ],
        );
    }
}
