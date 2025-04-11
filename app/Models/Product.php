<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nếu muốn khai báo các cột có thể gán tự động:
    protected $fillable = ['name', 'description', 'price', 'image'];
    public function products()
{
    return $this->hasMany(Product::class);
}

}
