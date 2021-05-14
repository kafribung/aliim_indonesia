<?php

namespace App\Http\Requests;

use App\Rules\LowercaseRule;
use Illuminate\Foundation\Http\FormRequest;

class KategoriArtikelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bools
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
            'title' => ['required', 'string', 'min:3', 'max:255', new LowercaseRule], 
        ];
    }
}
