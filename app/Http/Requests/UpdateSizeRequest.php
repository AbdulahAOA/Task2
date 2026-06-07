<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateSizeRequest extends FormRequest
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
    $size = $this->route('size');

    return [

        /*
        |--------------------------------------------------------------------------
        | Size Names
        |--------------------------------------------------------------------------
        */
        'name_ar' => [
            'required',
            'string',
            'max:255',
            Rule::unique('sizes', 'name_ar')
                ->ignore($size),
        ],

        'name_en' => [
            'required',
            'string',
            'max:255',
            Rule::unique('sizes', 'name_en')
                ->ignore($size),
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
