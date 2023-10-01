<?php

namespace App\Queries;

use App\Models\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class SectionQueryBuilder extends QueryBuilder
{
    public function getModel():Builder
    { 
        return Section::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->paginate(20);
    }


   
}