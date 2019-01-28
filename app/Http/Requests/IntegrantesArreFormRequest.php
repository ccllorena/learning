<?php

namespace learning\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntegrantesArreFormRequest extends FormRequest
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
           'nombre' => 'required|max:100',
           'rut' => 'required|max:900000000|numeric',
           'dig' => 'required|max:10',
           'id_arrendatarios' => 'required',
           'imagen' => 'mimes:jpg,gif,png'
        ];
    }
}
