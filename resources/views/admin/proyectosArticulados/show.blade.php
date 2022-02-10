@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proyectosArticulado.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proyectos-articulados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.titulo_del_trabajo') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->titulo_del_trabajo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.nombres_y_apellidos_de_los_autores_de_la_investigacion') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->nombres_y_apellidos_de_los_autores_de_la_investigacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.nombres_y_apellidos_del_asesor_del_trabajo') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->nombres_y_apellidos_del_asesor_del_trabajo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.ano_en_que_se_realizo_la_investigacion') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->ano_en_que_se_realizo_la_investigacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.linea_de_investigacion') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->linea_de_investigacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.abstract_resumen_documental') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->abstract_resumen_documental }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.palabras_clave') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->palabras_clave }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.proyecto') }}
                        </th>
                        <td>
                            @if($proyectosArticulado->proyecto)
                                <a href="{{ $proyectosArticulado->proyecto->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.publicar') }}
                        </th>
                        <td>
                            {{ App\Models\ProyectosArticulado::PUBLICAR_RADIO[$proyectosArticulado->publicar] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proyectos-articulados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection