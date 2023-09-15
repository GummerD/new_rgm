<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function scopeLevel(Builder $query, int $levelId): void
    {
        $query->where('level_id', $levelId);
    }

}
