<?php

namespace App\Queries;

use App\Models\GroupsTask;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class GroupsTaskQueryBuilder extends QueryBuilder
{
    public function getModel():Builder
    { 
        return GroupsTask::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->paginate(20);
    }


   
}