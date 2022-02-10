<?php

namespace App\Http\Requests;

use App\Models\ImportarEmpleado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyImportarEmpleadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('importar_empleado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:importar_empleados,id',
        ];
    }
}
