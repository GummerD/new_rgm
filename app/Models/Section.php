<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
  use HasFactory;
  
  public $timestamps = false;

  protected $fillable = [
    'num_section',
    'name_section',
    'desc_section',
  ];

  
  // Связи
  public function task(): HasMany
  {
      return $this->hasMany(Task::class);
  }
}
