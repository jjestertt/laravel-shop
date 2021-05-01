<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory;
    //Функция связи один ко многим
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function categories()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categories_id');
    }
}
