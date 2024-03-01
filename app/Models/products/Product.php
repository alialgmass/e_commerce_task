<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'image_path',
        'quantity',
        'price'
    ];

    public function getImageUrlAttribute()
    {
    return asset($this->image_path);
    }

}
