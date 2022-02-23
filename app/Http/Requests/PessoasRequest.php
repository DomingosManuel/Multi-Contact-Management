<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoasRequest extends FormRequest
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
            'nome'=>'bail|required|min:6|string|',
            'email'=>"bail|required|email|unique:pessoas,email,$this->id",
            'identidade'=>"bail|required|integer|unique:pessoas,identidade,$this->id"
        ];
    }
}
