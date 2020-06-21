<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UstadRequest extends FormRequest
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
            'img'      => ['required', 'mimes:png,jpg,jpeg'],
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date_birth'=> ['required', 'date'],
            'gender'   => ['required', 'string', 'min:4', 'max:6'],
            'provinci' => ['required', 'string', 'min:3'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
}
