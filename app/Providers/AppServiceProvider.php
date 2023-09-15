<?php

namespace App\Providers;

use App\Queries\QueryBuilder;
use App\Queries\TasksQueryBuilder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator as PaginationPaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, TasksQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PaginationPaginator::useBootstrapFive();
    }
}
