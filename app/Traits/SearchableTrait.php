<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SearchableTrait
{
    public function scopeSearch(Builder $query, string $searchTerm, array $columns): Builder
    {
        return $query->where(function ($query) use ($searchTerm, $columns) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', "%{$searchTerm}%");
            }
        });
    }
}