<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'path_img',
    'rating',
    'correct_answer',
    'incorrect_answer',
    'num_trainings',
  ];

  public function user(): HasOne
  {
    return $this->hasOne(User::class, 'id', 'id_user');
  }
}
