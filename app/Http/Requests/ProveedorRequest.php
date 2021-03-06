<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'tipodocumento_id' => 'required',
            'cedularif' => 'required|unique:proveedors,cedularif' . $this->proveedor,
            'nombre' => 'required|min:3|max:20',
            'slug' => 'required|min:3|max:20',
            'direccion' => 'required',
            'correo' => 'required|unique:proveedors,correo' . $this->proveedor,
            'telefono' => 'required',
        ];
    }
}
