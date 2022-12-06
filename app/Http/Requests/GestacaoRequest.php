<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GestacaoRequest extends FormRequest
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
            'IDANIMAL'=> 'required',
            'DAINSEMINACAO'=> 'required|date',
            'DANASCIMENTOESTIMADO'=> 'required|date',
            'TPCUIDADO'=> 'required|max:1',
        ];
    }
}
