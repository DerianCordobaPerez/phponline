<?php

declare(strict_types=1);

namespace App\Providers;

use Domains\Accounts\Commands\CreateUserAccount;
use Domains\Accounts\Commands\RemoveAccount;
use Domains\Accounts\Commands\UpdateAccount;
use Domains\Content\Queries\FetchArticles;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Accounts\Commands\CreateUserAccountContract;
use Infrastructure\Accounts\Commands\RemoveAccountContract;
use Infrastructure\Accounts\Commands\UpdateAccountContract;
use Infrastructure\Content\Queries\FetchArticlesContract;

final class BindingServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Commands
        CreateUserAccountContract::class => CreateUserAccount::class,
        UpdateAccountContract::class => UpdateAccount::class,
        RemoveAccountContract::class => RemoveAccount::class,

        // Queries
        FetchArticlesContract::class => FetchArticles::class,
    ];
}
