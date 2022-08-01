<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait Slugable {

    public function scopeFindSlug(string $slug, Builder $builder): Builder
    {
        return $builder->whereSlug($slug);
    }
}
