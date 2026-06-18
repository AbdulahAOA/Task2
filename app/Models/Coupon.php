<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [

        'code',
        'type',
        'value',
        'usage_limit',
        'used_count',
        'expires_at',
         'status',
         'category_id',
         'customer_id',
    ];
                public function category()
            {
                return $this->belongsTo(
                    Category::class
                );
      
                }
                public function customer()
{
    return $this->belongsTo(
        Customer::class
    );
}
}