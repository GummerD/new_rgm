<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
     
    use HasFactory;
   
    public $timestamps = false;
    

    protected $fillable = [
        'user_id',
        'avatar_id',
        'rating',
        'correct_answer',
        'incorrect_answer',
        'num_trainings',
    ];

    public function avatar(): HasOne
    {
        return $this->hasOne(Avatar::class);
    }
 
}
