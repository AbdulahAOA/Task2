<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Traits
    |--------------------------------------------------------------------------
    */
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'name_ar',
        'name_en',
        'status',
        'created_by',
        'updated_by',
    ];
/**
 * Size prices.
 */
public function prices()
{
    return $this->hasMany(
        ProductPrice::class
    );
}
/**
 * Size variation quantities.
 */
public function variationQuantities()
{
    return $this->hasMany(
        ProductVariationQuantity::class
    );
}


}