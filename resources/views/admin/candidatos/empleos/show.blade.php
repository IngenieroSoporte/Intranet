@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.empleo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.empleos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.vacante') }}
                        </th>
                        <td>
                            {{ $empleo->vacante }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $empleo->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.requisitos') }}
                        </th>
                        <td>
                            {!! $empleo->requisitos !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.tiempo') }}
                        </th>
                        <td>
                            {{ $empleo->tiempo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.salario') }}
                        </th>
                        <td>
                            {{ $empleo->salario->nuevo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.publicar') }}
                        </th>
                        <td>
                            {{ App\Models\Empleo::PUBLICAR_RADIO[$empleo->publicar] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.empleos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#vacante_a_la_que_se_postula_candidatos" role="tab" data-toggle="tab">
                {{ trans('cruds.candidato.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vacante_a_la_que_se_postula_candidatos">
            @includeIf('admin.empleos.relationships.vacanteALaQueSePostulaCandidatos', ['candidatos' => $empleo->vacanteALaQueSePostulaCandidatos])
        </div>
    </div>
</div>

@endsection