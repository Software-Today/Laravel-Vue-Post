<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CategoryScope;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    //locally scope
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    //relationship with category
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    //globally scope
    public static function boot() {

        parent::boot();

        static::addGlobalScope(new CategoryScope);
    }
}
