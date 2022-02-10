<?php

namespace App\Http\Requests;

use App\Models\Estudio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEstudioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('estudio_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
        ];
    }
}
