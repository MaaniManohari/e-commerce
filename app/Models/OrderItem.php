<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items'; // Ensure this matches your table name

    protected $fillable = [
        'order_id',
        'products_id',
        'product_image',
        'quantity',
        'price',
        'total'
    ];

    /**
     * The order that owns the item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Assuming there is a product model, you might want to define a relationship to it.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
