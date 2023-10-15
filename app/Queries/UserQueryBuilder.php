<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserQueryBuilder extends QueryBuilder
{
  public function getModel(): Builder
  {
    return User::query();
  }

  public function getAll(): Collection
  {
    return $this->getModel()->with('profile')->get();
  }


  public function getUserById(string $id): Collection
  {
    return $this->getModel()->user($id)->get();
  }
}
