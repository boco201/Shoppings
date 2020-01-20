<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
