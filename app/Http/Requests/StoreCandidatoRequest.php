<?php

namespace App\Http\Requests;

use App\Models\Candidato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCandidatoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('candidato_create');
    }

    public function rules()
    {
        return [
            'primer_apellido' => [
                'string',
                'required',
            ],
            'segundo_apellido' => [
                'string',
                'required',
            ],
            'nombres' => [
                'string',
                'required',
            ],
            'documento_de_identidad' => [
                'required',
            ],
            'no_de_identificacion' => [
                'numeric',
                'required',
            ],
            'fecha_de_expedicion_del_documento' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_de_nacimiento' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'departamento_de_nacimiento' => [
                'string',
                'required',
            ],
            'ciudad_de_nacimiento' => [
                'string',
                'required',
            ],
            'direccion' => [
                'string',
                'required',
            ],
            'telefono_personal' => [
                'string',
                'required',
            ],
            'celular_personal' => [
                'string',
                'required',
            ],
            'email_personal' => [
                'required',
            ],
            'telefono_familiar' => [
                'string',
                'required',
            ],
            'celular_familiar' => [
                'string',
                'required',
            ],
            'email_familiar' => [
                'required',
            ],
            'secundaria' => [
                'string',
                'nullable',
            ],
            'media' => [
                'string',
                'nullable',
            ],
            'titulo_obtenido' => [
                'string',
                'nullable',
            ],
            'fecha_de_graduacion' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'formacion_academica_profesionals.*' => [
                'integer',
            ],
            'formacion_academica_profesionals' => [
                'array',
            ],
            'idiomas.*' => [
                'integer',
            ],
            'idiomas' => [
                'array',
            ],
            'ofimaticas.*' => [
                'integer',
            ],
            'ofimaticas' => [
                'array',
            ],
        ];
    }
}
