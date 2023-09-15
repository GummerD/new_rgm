<?php

namespace App\Queries;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TasksQueryBuilder extends QueryBuilder
{
    public function getModel():Builder
    { 
        return Task::query();
    }

    // public function getAll(): LengthAwarePaginator
    // {
    //     return $this->getModel()->paginate(4);
    // }


    public function getTasksByLevel(int $levelId):LengthAwarePaginator
    {
        return $this->getModel()->level($levelId)->paginate(3);
    }


}