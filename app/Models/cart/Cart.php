<?php

namespace App\Models\cart;

use App\Models\products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable=['user_id','product_id','quantity'];
    public function scopeWhereProductId($query, $productId)
    {
        return $query->where('product_id', $productId)->where('user_id', auth()->user()->getAuthIdentifier());
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
