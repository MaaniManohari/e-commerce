<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // Ensure this matches your table name

    protected $fillable = [
        'user_id',
        'additional',
        'grand_total',
        'order_no',
        'address',
        'status',
        'reason'
    ];

    /**
     * The user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The items that belong to the order.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * Optionally, you can define an accessor for formatted grand total.
     */
    public function getFormattedGrandTotalAttribute()
    {
        return number_format($this->grand_total, 2);
    }
}
