<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function scopeLevel(Builder $query, int $level_id): void
    {
        $query->where('level_id', $level_id);
    }

}
