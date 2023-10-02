<?php

namespace App\Queries;

use App\Models\Level;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class LevelQueryBuilder extends QueryBuilder
{
    public function getModel():Builder
    { 
        return Level::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->paginate(20);
    }


   
}