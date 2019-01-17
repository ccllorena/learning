<?php

namespace learning\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArrendatariosFormRequest extends FormRequest
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
        'nombre',
        'rut',
        'dig',
        'imagen',
        'id_coopropietario',
        'fecha_inic',
        'fecha_term',
        'created_at',
        'updated_at'
        ];
    }
}
