<?php

namespace App\Http\Requests;

use App\Models\Ofimatica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOfimaticaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ofimatica_edit');
    }

    public function rules()
    {
        return [
            'nuevo' => [
                'string',
                'required',
            ],
            'nivel' => [
                'string',
                'nullable',
            ],
        ];
    }
}
