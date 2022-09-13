<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PostScope implements Scope
{

    // public function apply(Builder $builder, Model $model)
    // {

    //     $builder->orderBy('id', 'desc');

    //     $builder->when(request()->has('keyword'), function ($q) {
    //         $q->where(function ($q2) {
    //             return $q2->where('title', 'LIKE', '%' . request('keyword') . '%')
    //                 ->orWhere('tag', 'LIKE', '%' . request('keyword') . '%');
    //         });
    //     });

    //     $builder->whereHas('category', function ($query){
    //         return $query->where('category_name', 'like', '%'.request('keyword').'%');
    //     });

    // }

    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('id', 'asc')
            ->when(request()->has('keyword'), function ($q) {
                 $q->where(function ($q2) {
                     $q2->where('title', 'LIKE', '%' . request('keyword') . '%')
                        ->orWhere('tag', 'LIKE', '%' . request('keyword') . '%');
                })
                ->orWhereHas('category', function ($query) {
                     $query->where('category_name', 'LIKE', '%' . request('keyword') . '%');
                });
            });
    }
}
