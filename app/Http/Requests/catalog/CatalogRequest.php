<?php

namespace App\Http\Requests\catalog;

use Illuminate\Foundation\Http\FormRequest;

class CatalogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required| regex:~^[a-zA-Z0-9 ]+$~',
            'description' => 'required|regex:~^[a-zA-Z0-9()-:., _=&]+$~',
            'price' => 'required|numeric',
        ];

    }
}
