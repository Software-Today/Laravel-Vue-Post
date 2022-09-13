<?php

namespace App\Models;

use App\Models\Scopes\PostScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    //Relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    //Using Global Scope
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PostScope);
    }
}


