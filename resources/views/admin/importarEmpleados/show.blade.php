@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.importarEmpleado.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.importar-empleados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.id') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.nombre') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.cedula') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->cedula }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.lugar_de_expedicion_de_la_cedula') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->lugar_de_expedicion_de_la_cedula }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.cargo_actual') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->cargo_actual }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_de_inicio_contrato_actual') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_de_inicio_contrato_actual }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.salario') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->salario }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.salario_en_letras') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->salario_en_letras }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_primero_contrato') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_inicial_del_primero_contrato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_final_del_primero_contrato') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_final_del_primero_contrato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_segundo_contrato') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_inicial_del_segundo_contrato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_final_del_segundo_contrato') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_final_del_segundo_contrato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_tercer_contrato') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_inicial_del_tercer_contrato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_final_del_tercer_contrato') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_final_del_tercer_contrato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_cuarto_contrato') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_inicial_del_cuarto_contrato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importarEmpleado.fields.fecha_final_del_cuarto_contrato') }}
                        </th>
                        <td>
                            {{ $importarEmpleado->fecha_final_del_cuarto_contrato }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.importar-empleados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection