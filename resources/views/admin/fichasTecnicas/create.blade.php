@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fichasTecnica.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fichas-tecnicas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="encargado">{{ trans('cruds.fichasTecnica.fields.encargado') }}</label>
                <input class="form-control {{ $errors->has('encargado') ? 'is-invalid' : '' }}" type="text" name="encargado" id="encargado" value="{{ old('encargado', '') }}" required>
                @if($errors->has('encargado'))
                    <span class="text-danger">{{ $errors->first('encargado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.encargado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_del_equipo">{{ trans('cruds.fichasTecnica.fields.nombre_del_equipo') }}</label>
                <input class="form-control {{ $errors->has('nombre_del_equipo') ? 'is-invalid' : '' }}" type="text" name="nombre_del_equipo" id="nombre_del_equipo" value="{{ old('nombre_del_equipo', '') }}" required>
                @if($errors->has('nombre_del_equipo'))
                    <span class="text-danger">{{ $errors->first('nombre_del_equipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.nombre_del_equipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="modelo">{{ trans('cruds.fichasTecnica.fields.modelo') }}</label>
                <input class="form-control {{ $errors->has('modelo') ? 'is-invalid' : '' }}" type="text" name="modelo" id="modelo" value="{{ old('modelo', '') }}">
                @if($errors->has('modelo'))
                    <span class="text-danger">{{ $errors->first('modelo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.modelo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serial">{{ trans('cruds.fichasTecnica.fields.serial') }}</label>
                <input class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" type="text" name="serial" id="serial" value="{{ old('serial', '') }}">
                @if($errors->has('serial'))
                    <span class="text-danger">{{ $errors->first('serial') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.serial_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="componentes">{{ trans('cruds.fichasTecnica.fields.componentes') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('componentes') ? 'is-invalid' : '' }}" name="componentes[]" id="componentes" multiple required>
                    @foreach($componentes as $id => $componente)
                        <option value="{{ $id }}" {{ in_array($id, old('componentes', [])) ? 'selected' : '' }}>{{ $componente }}</option>
                    @endforeach
                </select>
                @if($errors->has('componentes'))
                    <span class="text-danger">{{ $errors->first('componentes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.componentes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sede_id">{{ trans('cruds.fichasTecnica.fields.sede') }}</label>
                <select class="form-control select2 {{ $errors->has('sede') ? 'is-invalid' : '' }}" name="sede_id" id="sede_id" required>
                    @foreach($sedes as $id => $entry)
                        <option value="{{ $id }}" {{ old('sede_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sede'))
                    <span class="text-danger">{{ $errors->first('sede') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.sede_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.fichasTecnica.fields.observaciones') }}</label>
                <textarea class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" name="observaciones" id="observaciones">{{ old('observaciones') }}</textarea>
                @if($errors->has('observaciones'))
                    <span class="text-danger">{{ $errors->first('observaciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.fichasTecnica.fields.estado_del_activo') }}</label>
                @foreach(App\Models\FichasTecnica::ESTADO_DEL_ACTIVO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('estado_del_activo') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="estado_del_activo_{{ $key }}" name="estado_del_activo" value="{{ $key }}" {{ old('estado_del_activo', 'Seleccione..') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="estado_del_activo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('estado_del_activo'))
                    <span class="text-danger">{{ $errors->first('estado_del_activo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.estado_del_activo_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection