<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class MyTaskScope implements Scope
{

    public function apply(Builder $builder, Model $model): void
    {
        $user = auth()->user()->is_admin;
        $builder->when(!$user, function ($query) {
            return $query->where('user_id', auth()->id());
        }); 
    }
}
