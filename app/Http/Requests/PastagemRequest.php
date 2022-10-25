<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastagemRequest extends FormRequest
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
            'NMPASTAGEM'=> 'required|max:100',
            'DSPASTAGEM'=> 'required|max:300',
            'FLATIVO'=> 'required|max:1',
            'DSPASTAGEM'=> 'required'
        ];
    }
}
