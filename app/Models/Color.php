<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
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
 * Color products.
 */
public function products()
{
    return $this->belongsToMany(
        Product::class,
        'product_colors'
    );
}


}