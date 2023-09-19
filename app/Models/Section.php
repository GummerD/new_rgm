<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'num_section',
    'name_section',
    'desc_section',
  ];

  public function tasks(): HasMany
  {
    return $this->hasMany(Task::class);
  }
}
