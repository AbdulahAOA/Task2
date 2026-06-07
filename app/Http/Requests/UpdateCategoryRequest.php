<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateCategoryRequest extends FormRequest
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
    $category = $this->route('category');

    return [

        /*
        |--------------------------------------------------------------------------
        | Parent Category
        |--------------------------------------------------------------------------
        */
        'parent_category_id' => [
            'nullable',
            'exists:categories,id'
        ],

        /*
        |--------------------------------------------------------------------------
        | Category Names
        |--------------------------------------------------------------------------
        */
        'name_ar' => [
            'required',
            'string',
            'max:255',
            Rule::unique('categories', 'name_ar')
                ->ignore($category),
        ],

        'name_en' => [
            'required',
            'string',
            'max:255',
            Rule::unique('categories', 'name_en')
                ->ignore($category),
        ],

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */
        'status' => [
            'required',
            'integer',
            'in:1,2'
        ],
    ];
}
}
