<?php

declare(strict_types=1);

namespace App\Providers;

use Domains\Accounts\Commands\CreateUserAccount;
use Domains\Accounts\Commands\RemoveAccount;
use Domains\Accounts\Commands\UpdateAccount;
use Domains\Content\Commands\PublishNewArticle;
use Domains\Content\Commands\RegisterNewSource;
use Domains\Content\Queries\FetchArticles;
use Domains\Content\Queries\FetchUserSources;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Accounts\Commands\CreateUserAccountContract;
use Infrastructure\Accounts\Commands\RemoveAccountContract;
use Infrastructure\Accounts\Commands\UpdateAccountContract;
use Infrastructure\Content\Commands\PublishNewArticleContract;
use Infrastructure\Content\Commands\RegisterNewSourceContract;
use Infrastructure\Content\Queries\FetchArticlesContract;
use Infrastructure\Content\Queries\FetchUserSourcesContract;

final class BindingServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Commands
        CreateUserAccountContract::class => CreateUserAccount::class,
        UpdateAccountContract::class => UpdateAccount::class,
        RemoveAccountContract::class => RemoveAccount::class,
        RegisterNewSourceContract::class => RegisterNewSource::class,
        PublishNewArticleContract::class => PublishNewArticle::class,

        // Queries
        FetchArticlesContract::class => FetchArticles::class,
        FetchUserSourcesContract::class => FetchUserSources::class,
    ];
}
