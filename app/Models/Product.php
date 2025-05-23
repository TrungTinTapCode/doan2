<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'description', 'price', 'image', 'category_id', 'quantity','is_featured', 'volume',];


    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
}
