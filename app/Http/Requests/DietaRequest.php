<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DietaRequest extends FormRequest
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
            'NMDIETA'=> 'required|max:100',
            'DSDIETA'=> 'required',
            'TPUSODIETA'=> 'required|max:1',
            'IDRACAO'=> 'required',
            'FLATIVO'=> 'required|max:1',
        ];
    }
}
