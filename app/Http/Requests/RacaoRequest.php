<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RacaoRequest extends FormRequest
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
            'NMRACAO'=> 'required|max:100',
            'NMFABRICANTE'=> 'required|max:100',
            'QTKG'=> 'required',
            'DAVALIDADE'=> 'required|date',
            'DSRACAO'=> 'required|max:300',
            'FLATIVO' => 'required|max:1'
        ];
    }
}
