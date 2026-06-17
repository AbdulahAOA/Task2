<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'parent_category_id' => [
                'nullable',
                'exists:categories,id'
            ],

            'name_ar' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name_ar'
            ],

            'name_en' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name_en'
            ],

            'status' => [
                'required',
                'integer',
                'in:1,2'
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'name_ar.unique' => 'Arabic category name already exists.',

            'name_en.unique' => 'English category name already exists.',

            'name_ar.required' => 'Arabic category name is required.',

            'name_en.required' => 'English category name is required.',

        ];
    }
}