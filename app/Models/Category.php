<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
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
        'parent_category_id',
        'name_ar',
        'name_en',
        'status',
        'created_by',
        'updated_by',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Get category parent.
     */
    public function parent()
    {
        return $this->belongsTo(
            Category::class,
            'parent_category_id'
        );
    }

    /**
     * Get category children.
     */
    public function children()
    {
        return $this->hasMany(
            Category::class,
            'parent_category_id'
        );
    }
/**
 * Category products.
 */
public function products()
{
    return $this->hasMany(
        Product::class
    );
}


}