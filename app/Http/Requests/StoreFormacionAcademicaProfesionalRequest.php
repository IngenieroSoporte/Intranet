<?php

namespace App\Http\Requests;

use App\Models\FormacionAcademicaProfesional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFormacionAcademicaProfesionalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('formacion_academica_profesional_create');
    }

    public function rules()
    {
        return [
            'titulo' => [
                'string',
                'nullable',
            ],
            'numero_de_semestres' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'fecha_de_graduacion' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
