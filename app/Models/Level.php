<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'num_level',
    'name_level',
    'desc_level',
  ];

  public function tasks(): HasMany
  {
    return $this->hasMany(Task::class);
  }
}
