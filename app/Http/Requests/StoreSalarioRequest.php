<?php

namespace App\Http\Requests;

use App\Models\Salario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salario_create');
    }

    public function rules()
    {
        return [
            'nuevo' => [
                'string',
                'required',
            ],
        ];
    }
}
