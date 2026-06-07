<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductPrice;
use App\Models\ProductVariationQuantity;
class Product extends Model
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
        'category_id',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'status',
        'image',
        'created_by',
        'updated_by',
    ];
    /**
 * Product category.
 */
public function category()
{
    return $this->belongsTo(Category::class);
}


/**
 * Product colors.
 */
public function colors()
{
    return $this->belongsToMany(
        Color::class,
        'product_colors'
    );
}

/**
 * Product prices.
 */
public function prices()
{
    return $this->hasMany(
        ProductPrice::class
    );
}

/**
 * Product variation quantities.
 */
public function variationQuantities()
{
    return $this->hasMany(
        ProductVariationQuantity::class
    );
}

public function images()
{
    return $this->hasMany(ProductImage::class);
}

}