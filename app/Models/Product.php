<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;
    //Функция связи один ко многим
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
