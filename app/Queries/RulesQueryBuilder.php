<?php

namespace App\Queries;

use App\Models\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class RulesQueryBuilder extends QueryBuilder
{
    public function getModel():Builder
    { 
        return Rule::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->paginate(50);
    }


   
}