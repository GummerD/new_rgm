<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
  use HasFactory;

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

  // public function level(): BelongsTo
  // {
  //     return $this->belongsTo(Level::class);
  // }

  // public function groupsTask(): BelongsTo
  // {
  //     return $this->belongsTo(GroupsTask::class);
  // }

  // public function section(): BelongsTo
  // {
  //     return $this->belongsTo(Section::class);
  // }





  public function scopeLevel(Builder $query, int $level_id): void
  {
    $query->where('level_id', $level_id);
  }
}
