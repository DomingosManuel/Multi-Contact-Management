<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactosRequest extends FormRequest
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
          'numero'=>"bail|required|max:9|unique:contactos,numero,$this->id",
          'cod'=>"bail|required"
        ];
    }
}
