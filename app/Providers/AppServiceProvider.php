<?php

namespace App\Providers;

use App\Http\Controllers\Rules\RulesPageController;
use App\Queries\QueryBuilder;
use App\Queries\RulesQueryBuilder;
use App\Queries\TasksQueryBuilder;
use App\Queries\UserQueryBuilder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator as PaginationPaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, UserQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, TasksQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, RulesQueryBuilder::class);
    
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PaginationPaginator::useBootstrapFive();
    }
}
