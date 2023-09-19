<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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


}
