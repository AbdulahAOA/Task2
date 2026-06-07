<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'product_id',
        'size_id',
        'price',
        'on_sale_status',
        'after_sale_price',
        'created_by',
    ];
/**
 * Product.
 */
public function product()
{
    return $this->belongsTo(
        Product::class
    );
}

/**
 * Size.
 */
public function size()
{
    return $this->belongsTo(
        Size::class
    );
}

}