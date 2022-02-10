@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.importarEmpleado.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.importar-empleados.update", [$importarEmpleado->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nombre">{{ trans('cruds.importarEmpleado.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $importarEmpleado->nombre) }}">
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cedula">{{ trans('cruds.importarEmpleado.fields.cedula') }}</label>
                <input class="form-control {{ $errors->has('cedula') ? 'is-invalid' : '' }}" type="number" name="cedula" id="cedula" value="{{ old('cedula', $importarEmpleado->cedula) }}" step="0.01">
                @if($errors->has('cedula'))
                    <span class="text-danger">{{ $errors->first('cedula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.cedula_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lugar_de_expedicion_de_la_cedula">{{ trans('cruds.importarEmpleado.fields.lugar_de_expedicion_de_la_cedula') }}</label>
                <input class="form-control {{ $errors->has('lugar_de_expedicion_de_la_cedula') ? 'is-invalid' : '' }}" type="text" name="lugar_de_expedicion_de_la_cedula" id="lugar_de_expedicion_de_la_cedula" value="{{ old('lugar_de_expedicion_de_la_cedula', $importarEmpleado->lugar_de_expedicion_de_la_cedula) }}">
                @if($errors->has('lugar_de_expedicion_de_la_cedula'))
                    <span class="text-danger">{{ $errors->first('lugar_de_expedicion_de_la_cedula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.lugar_de_expedicion_de_la_cedula_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cargo_actual">{{ trans('cruds.importarEmpleado.fields.cargo_actual') }}</label>
                <input class="form-control {{ $errors->has('cargo_actual') ? 'is-invalid' : '' }}" type="text" name="cargo_actual" id="cargo_actual" value="{{ old('cargo_actual', $importarEmpleado->cargo_actual) }}">
                @if($errors->has('cargo_actual'))
                    <span class="text-danger">{{ $errors->first('cargo_actual') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.cargo_actual_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_de_inicio_contrato_actual">{{ trans('cruds.importarEmpleado.fields.fecha_de_inicio_contrato_actual') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_inicio_contrato_actual') ? 'is-invalid' : '' }}" type="text" name="fecha_de_inicio_contrato_actual" id="fecha_de_inicio_contrato_actual" value="{{ old('fecha_de_inicio_contrato_actual', $importarEmpleado->fecha_de_inicio_contrato_actual) }}">
                @if($errors->has('fecha_de_inicio_contrato_actual'))
                    <span class="text-danger">{{ $errors->first('fecha_de_inicio_contrato_actual') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_de_inicio_contrato_actual_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="salario">{{ trans('cruds.importarEmpleado.fields.salario') }}</label>
                <input class="form-control {{ $errors->has('salario') ? 'is-invalid' : '' }}" type="number" name="salario" id="salario" value="{{ old('salario', $importarEmpleado->salario) }}" step="0.01">
                @if($errors->has('salario'))
                    <span class="text-danger">{{ $errors->first('salario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.salario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="salario_en_letras">{{ trans('cruds.importarEmpleado.fields.salario_en_letras') }}</label>
                <input class="form-control {{ $errors->has('salario_en_letras') ? 'is-invalid' : '' }}" type="text" name="salario_en_letras" id="salario_en_letras" value="{{ old('salario_en_letras', $importarEmpleado->salario_en_letras) }}">
                @if($errors->has('salario_en_letras'))
                    <span class="text-danger">{{ $errors->first('salario_en_letras') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.salario_en_letras_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_inicial_del_primero_contrato">{{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_primero_contrato') }}</label>
                <input class="form-control date {{ $errors->has('fecha_inicial_del_primero_contrato') ? 'is-invalid' : '' }}" type="text" name="fecha_inicial_del_primero_contrato" id="fecha_inicial_del_primero_contrato" value="{{ old('fecha_inicial_del_primero_contrato', $importarEmpleado->fecha_inicial_del_primero_contrato) }}">
                @if($errors->has('fecha_inicial_del_primero_contrato'))
                    <span class="text-danger">{{ $errors->first('fecha_inicial_del_primero_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_primero_contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_final_del_primero_contrato">{{ trans('cruds.importarEmpleado.fields.fecha_final_del_primero_contrato') }}</label>
                <input class="form-control date {{ $errors->has('fecha_final_del_primero_contrato') ? 'is-invalid' : '' }}" type="text" name="fecha_final_del_primero_contrato" id="fecha_final_del_primero_contrato" value="{{ old('fecha_final_del_primero_contrato', $importarEmpleado->fecha_final_del_primero_contrato) }}">
                @if($errors->has('fecha_final_del_primero_contrato'))
                    <span class="text-danger">{{ $errors->first('fecha_final_del_primero_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_final_del_primero_contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_inicial_del_segundo_contrato">{{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_segundo_contrato') }}</label>
                <input class="form-control date {{ $errors->has('fecha_inicial_del_segundo_contrato') ? 'is-invalid' : '' }}" type="text" name="fecha_inicial_del_segundo_contrato" id="fecha_inicial_del_segundo_contrato" value="{{ old('fecha_inicial_del_segundo_contrato', $importarEmpleado->fecha_inicial_del_segundo_contrato) }}">
                @if($errors->has('fecha_inicial_del_segundo_contrato'))
                    <span class="text-danger">{{ $errors->first('fecha_inicial_del_segundo_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_segundo_contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_final_del_segundo_contrato">{{ trans('cruds.importarEmpleado.fields.fecha_final_del_segundo_contrato') }}</label>
                <input class="form-control date {{ $errors->has('fecha_final_del_segundo_contrato') ? 'is-invalid' : '' }}" type="text" name="fecha_final_del_segundo_contrato" id="fecha_final_del_segundo_contrato" value="{{ old('fecha_final_del_segundo_contrato', $importarEmpleado->fecha_final_del_segundo_contrato) }}">
                @if($errors->has('fecha_final_del_segundo_contrato'))
                    <span class="text-danger">{{ $errors->first('fecha_final_del_segundo_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_final_del_segundo_contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_inicial_del_tercer_contrato">{{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_tercer_contrato') }}</label>
                <input class="form-control {{ $errors->has('fecha_inicial_del_tercer_contrato') ? 'is-invalid' : '' }}" type="text" name="fecha_inicial_del_tercer_contrato" id="fecha_inicial_del_tercer_contrato" value="{{ old('fecha_inicial_del_tercer_contrato', $importarEmpleado->fecha_inicial_del_tercer_contrato) }}">
                @if($errors->has('fecha_inicial_del_tercer_contrato'))
                    <span class="text-danger">{{ $errors->first('fecha_inicial_del_tercer_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_tercer_contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_final_del_tercer_contrato">{{ trans('cruds.importarEmpleado.fields.fecha_final_del_tercer_contrato') }}</label>
                <input class="form-control date {{ $errors->has('fecha_final_del_tercer_contrato') ? 'is-invalid' : '' }}" type="text" name="fecha_final_del_tercer_contrato" id="fecha_final_del_tercer_contrato" value="{{ old('fecha_final_del_tercer_contrato', $importarEmpleado->fecha_final_del_tercer_contrato) }}">
                @if($errors->has('fecha_final_del_tercer_contrato'))
                    <span class="text-danger">{{ $errors->first('fecha_final_del_tercer_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_final_del_tercer_contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_inicial_del_cuarto_contrato">{{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_cuarto_contrato') }}</label>
                <input class="form-control date {{ $errors->has('fecha_inicial_del_cuarto_contrato') ? 'is-invalid' : '' }}" type="text" name="fecha_inicial_del_cuarto_contrato" id="fecha_inicial_del_cuarto_contrato" value="{{ old('fecha_inicial_del_cuarto_contrato', $importarEmpleado->fecha_inicial_del_cuarto_contrato) }}">
                @if($errors->has('fecha_inicial_del_cuarto_contrato'))
                    <span class="text-danger">{{ $errors->first('fecha_inicial_del_cuarto_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_inicial_del_cuarto_contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_final_del_cuarto_contrato">{{ trans('cruds.importarEmpleado.fields.fecha_final_del_cuarto_contrato') }}</label>
                <input class="form-control date {{ $errors->has('fecha_final_del_cuarto_contrato') ? 'is-invalid' : '' }}" type="text" name="fecha_final_del_cuarto_contrato" id="fecha_final_del_cuarto_contrato" value="{{ old('fecha_final_del_cuarto_contrato', $importarEmpleado->fecha_final_del_cuarto_contrato) }}">
                @if($errors->has('fecha_final_del_cuarto_contrato'))
                    <span class="text-danger">{{ $errors->first('fecha_final_del_cuarto_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importarEmpleado.fields.fecha_final_del_cuarto_contrato_helper') }}</span>
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