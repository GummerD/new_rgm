<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GroupsTask extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'num_group',
    'desc_group',
  ];

  public function tasks(): HasMany
  {
    return $this->hasMany(Task::class);
  }
}
