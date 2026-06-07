<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
{
    return [

        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */
        'category_id' => [
            'required',
            'exists:categories,id',
        ],

        /*
        |--------------------------------------------------------------------------
        | Product Names
        |--------------------------------------------------------------------------
        */
        'name_ar' => [
            'required',
            'string',
            'max:255',
            'unique:products,name_ar',
        ],

        'name_en' => [
            'required',
            'string',
            'max:255',
            'unique:products,name_en',
        ],

        /*
        |--------------------------------------------------------------------------
        | Descriptions
        |--------------------------------------------------------------------------
        */
        'description_ar' => [
            'nullable',
            'string',
        ],

        'description_en' => [
            'nullable',
            'string',
        ],

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */
        'status' => [
            'required',
            'integer',
            'in:1,2',
        ],
    ];
}
}
