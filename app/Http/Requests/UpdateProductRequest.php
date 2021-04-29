<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'carac1' => ['required', 'string', 'max:510'],
            'carac2' => ['required', 'string', 'max:255'],
            'carac3' => ['required', 'numeric', 'max:999'],
            'attach_catalogs' => ['array'],
            'attach_catalogs.*' => ['numeric', 'min:1'],
            'detach_catalogs' => ['array'],
            'detach_catalogs.*' => ['numeric', 'min:1'],
            'attach_categories' => ['array'],
            'attach_categories.*' => ['numeric', 'min:1'],
            'detach_categories' => ['array'],
            'detach_categories.*' => ['numeric', 'min:1']
        ];
    }
}
