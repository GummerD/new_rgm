<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
  use HasFactory;

  public $timestamps = false;
  
  protected $fillable = [
    'level_id',
    'section_id',
    'group_id',
    'num_task',
    'task_text',
    'rule_use',
    'correct_answer',
    'string_task',
  ];

// Связи

  public function level(): BelongsTo
  {
      return $this->belongsTo(Level::class);
  }
  public function group(): BelongsTo
  {
      return $this->belongsTo(GroupsTask::class);
  }
  public function section(): BelongsTo
  {
      return $this->belongsTo(Section::class);
  }
}
