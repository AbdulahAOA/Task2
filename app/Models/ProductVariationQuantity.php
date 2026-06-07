<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariationQuantity extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'quantity',
        'status',
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
 * Color.
 */
public function color()
{
    return $this->belongsTo(
        Color::class
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