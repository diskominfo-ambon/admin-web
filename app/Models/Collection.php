<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;


    public function scopePosted(array $rule, Builder $builder): Builder
    {
        return $builder->whereIn('posted', $rule);
    }
}
