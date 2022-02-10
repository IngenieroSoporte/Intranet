<?php

namespace App\Http\Requests;

use App\Models\FormacionAcademicaProfesional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFormacionAcademicaProfesionalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('formacion_academica_profesional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:formacion_academica_profesionals,id',
        ];
    }
}
