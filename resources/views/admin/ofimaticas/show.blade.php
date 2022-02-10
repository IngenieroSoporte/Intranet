@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ofimatica.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ofimaticas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ofimatica.fields.id') }}
                        </th>
                        <td>
                            {{ $ofimatica->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ofimatica.fields.nuevo') }}
                        </th>
                        <td>
                            {{ $ofimatica->nuevo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ofimatica.fields.nivel') }}
                        </th>
                        <td>
                            {{ $ofimatica->nivel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ofimatica.fields.cetificacion') }}
                        </th>
                        <td>
                            {{ App\Models\Ofimatica::CETIFICACION_RADIO[$ofimatica->cetificacion] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ofimaticas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection