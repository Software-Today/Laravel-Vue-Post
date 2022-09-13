<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class CategoryScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('id', 'asc');
        $builder->when(request()->has('search'), function ($q) {
            $q->where(function ($q2) {
                return $q2->where('category_name', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('status', 'LIKE', '%' . request('search') . '%');
            });
        });

        $builder->when(request()->has('status'), function ($q) {
                $q->where('status', request('status'));
            });

        //Category with post; => Relationship query ; ei posts hoycce Category Model posts function name ta;
        // ->whereHas('posts', function($q) [
        //     $q->
        // ])
    }

    // public function apply(Builder $builder, Model $model)
    // {
    //     $builder->orderBy('id', 'asc');


    //     if (request()->has('search')) {
    //         $builder->where(function($q) {
    //             return $q->where('category_name', 'LIKE', '%'. request('search') .'%')
    //                 ->orWhere('status', 'LIKE', '%'. request('search') .'%');
    //         });
    //     }

    //     // ->whereHas('posts', function($q) [
    //     //     $q->
    //     // ])

    //     if (request()->has('status')) {
    //         $builder->where('status', request('status'));
    //     }
    // }
}
