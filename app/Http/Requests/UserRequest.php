<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name' => 'required|min:3|max:20',
                'last_name' => 'required|min:3|max:20',
                'nacionalidad_id' => 'required',
                'cedula' => 'required|unique:users,cedula' . $this->user,
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required|unique:users'
        ];
    }
}