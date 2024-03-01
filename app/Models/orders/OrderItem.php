<?php

namespace App\Models\orders;

use App\Models\products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table='order_items';
    protected $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
