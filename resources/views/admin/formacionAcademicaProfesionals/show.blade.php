@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.formacionAcademicaProfesional.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.formacion-academica-profesionals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.formacionAcademicaProfesional.fields.id') }}
                        </th>
                        <td>
                            {{ $formacionAcademicaProfesional->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formacionAcademicaProfesional.fields.titulo') }}
                        </th>
                        <td>
                            {{ $formacionAcademicaProfesional->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formacionAcademicaProfesional.fields.numero_de_semestres') }}
                        </th>
                        <td>
                            {{ $formacionAcademicaProfesional->numero_de_semestres }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formacionAcademicaProfesional.fields.graduado') }}
                        </th>
                        <td>
                            {{ App\Models\FormacionAcademicaProfesional::GRADUADO_RADIO[$formacionAcademicaProfesional->graduado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formacionAcademicaProfesional.fields.fecha_de_graduacion') }}
                        </th>
                        <td>
                            {{ $formacionAcademicaProfesional->fecha_de_graduacion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.formacion-academica-profesionals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection