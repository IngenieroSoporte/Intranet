@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.formacionAcademicaProfesional.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.formacion-academica-profesionals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">{{ trans('cruds.formacionAcademicaProfesional.fields.titulo') }}</label>
                <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" type="text" name="titulo" id="titulo" value="{{ old('titulo', '') }}">
                @if($errors->has('titulo'))
                    <span class="text-danger">{{ $errors->first('titulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.formacionAcademicaProfesional.fields.titulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_de_semestres">{{ trans('cruds.formacionAcademicaProfesional.fields.numero_de_semestres') }}</label>
                <input class="form-control {{ $errors->has('numero_de_semestres') ? 'is-invalid' : '' }}" type="number" name="numero_de_semestres" id="numero_de_semestres" value="{{ old('numero_de_semestres', '') }}" step="1">
                @if($errors->has('numero_de_semestres'))
                    <span class="text-danger">{{ $errors->first('numero_de_semestres') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.formacionAcademicaProfesional.fields.numero_de_semestres_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.formacionAcademicaProfesional.fields.graduado') }}</label>
                @foreach(App\Models\FormacionAcademicaProfesional::GRADUADO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('graduado') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="graduado_{{ $key }}" name="graduado" value="{{ $key }}" {{ old('graduado', 'si') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="graduado_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('graduado'))
                    <span class="text-danger">{{ $errors->first('graduado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.formacionAcademicaProfesional.fields.graduado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_de_graduacion">{{ trans('cruds.formacionAcademicaProfesional.fields.fecha_de_graduacion') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_graduacion') ? 'is-invalid' : '' }}" type="text" name="fecha_de_graduacion" id="fecha_de_graduacion" value="{{ old('fecha_de_graduacion') }}">
                @if($errors->has('fecha_de_graduacion'))
                    <span class="text-danger">{{ $errors->first('fecha_de_graduacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.formacionAcademicaProfesional.fields.fecha_de_graduacion_helper') }}</span>
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