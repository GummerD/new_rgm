<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $fillable = [
    'num_level',
    'name_level',
    'desc_level',
  ];

// Связи
  public function task(): HasMany
  {
      return $this->hasMany(Task::class);
  }

}
