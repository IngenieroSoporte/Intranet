<?php

namespace App\Http\Requests;

use App\Models\ImportarEmpleado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateImportarEmpleadoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('importar_empleado_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'nullable',
            ],
            'cedula' => [
                'numeric',
            ],
            'lugar_de_expedicion_de_la_cedula' => [
                'string',
                'nullable',
            ],
            'cargo_actual' => [
                'string',
                'nullable',
            ],
            'fecha_de_inicio_contrato_actual' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'salario' => [
                'numeric',
            ],
            'salario_en_letras' => [
                'string',
                'nullable',
            ],
            'fecha_inicial_del_primero_contrato' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_final_del_primero_contrato' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_inicial_del_segundo_contrato' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_final_del_segundo_contrato' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_inicial_del_tercer_contrato' => [
                'string',
                'nullable',
            ],
            'fecha_final_del_tercer_contrato' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_inicial_del_cuarto_contrato' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_final_del_cuarto_contrato' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
