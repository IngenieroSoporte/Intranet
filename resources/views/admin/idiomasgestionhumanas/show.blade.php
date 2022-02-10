@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.idiomasgestionhumana.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.idiomasgestionhumanas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.idiomasgestionhumana.fields.id') }}
                        </th>
                        <td>
                            {{ $idiomasgestionhumana->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idiomasgestionhumana.fields.nuevo') }}
                        </th>
                        <td>
                            {{ $idiomasgestionhumana->nuevo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idiomasgestionhumana.fields.nivel') }}
                        </th>
                        <td>
                            {{ $idiomasgestionhumana->nivel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idiomasgestionhumana.fields.cetificacion') }}
                        </th>
                        <td>
                            {{ App\Models\Idiomasgestionhumana::CETIFICACION_RADIO[$idiomasgestionhumana->cetificacion] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.idiomasgestionhumanas.index') }}">
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
            <a class="nav-link" href="#idioma_candidatos" role="tab" data-toggle="tab">
                {{ trans('cruds.candidato.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="idioma_candidatos">
            @includeIf('admin.idiomasgestionhumanas.relationships.idiomaCandidatos', ['candidatos' => $idiomasgestionhumana->idiomaCandidatos])
        </div>
    </div>
</div>

@endsection