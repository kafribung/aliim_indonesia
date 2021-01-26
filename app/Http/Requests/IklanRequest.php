<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IklanRequest extends FormRequest
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
            'img'    => ['required', 'mimes:png,jpg,jpeg'],
            'owner'  => ['required', 'string', 'min:3', 'max:30'],
            'owner'  => ['required', 'string', 'min:3', 'max:30'],
            'wa'     => ['required', 'numeric'],
            'link'   => ['required', 'url']
        ];
    }
}
