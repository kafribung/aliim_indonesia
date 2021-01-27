<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UstadAdminRequest extends FormRequest
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
            'img'      => [(Request()->isMethod('patch') ? '' : 'required'), 'mimes:jpg,jpeg'],
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . optional(isset($this->admin) ? $this->admin : $this->ustad )->id],
            'date_birth'=> ['required', 'date'],
            'gender'   => ['required', 'string', 'min:4', 'max:6'],
            'provinci' => ['required', 'string'],
            'district' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
