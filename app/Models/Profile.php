<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $fillable = [
    'user_id',
    'path_img',
    'rating',
    'correct_answer',
    'incorrect_answer',
    'num_trainings',
  ];
}
