<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

abstract class QueryBuilder 
{
    abstract public function getModel(): Builder;
    abstract public function getAll(): Collection | LengthAwarePaginator;
}