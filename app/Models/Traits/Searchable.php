<?php

namespace App\Models\Traits;
use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function scopeSearch(Builder $query, string $search, ...$columns): Builder
    {
        return $query->when($search, function ($query) use ($search, $columns) {
            return $query->where(function ($query) use ($search, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $search . '%');
                }
            });
        });
    }
}