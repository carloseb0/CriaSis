<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinaRequest extends FormRequest
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
            'NMVACINA'=> 'required|max:100',
            'DSFINALIDADE'=> 'required|max:300',
            'NMFABRICANTE'=>'required|max:100|',
            'QTDOSE'=>'required|numeric|between:0,99.99',
            'DAVALIDADE'=>'required',
        ];
    }
}
