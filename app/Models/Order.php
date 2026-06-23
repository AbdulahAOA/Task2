<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [

    'customer_id',
    'total',
    'address',
    'status',
    'coupon_id',

    'original_total',
    'discount_amount',
    'discount_percent',

];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function coupon()
{
    return $this->belongsTo(Coupon::class);
}
}