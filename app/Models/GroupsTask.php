<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GroupsTask extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'num_group',
    'desc_group',
  ];

 
}
