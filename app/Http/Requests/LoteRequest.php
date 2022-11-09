<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoteRequest extends FormRequest
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
            'NMLOTE'=> 'required|max:50',
            'DSDESCRICAO'=> 'required',
            'FLATIVO' => 'required|max:1'
        ];
    }
}
