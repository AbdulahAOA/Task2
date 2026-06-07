<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'product_id',
        'color_id',
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
}