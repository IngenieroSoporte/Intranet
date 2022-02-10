@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.idiomasgestionhumana.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.idiomasgestionhumanas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nuevo">{{ trans('cruds.idiomasgestionhumana.fields.nuevo') }}</label>
                <input class="form-control {{ $errors->has('nuevo') ? 'is-invalid' : '' }}" type="text" name="nuevo" id="nuevo" value="{{ old('nuevo', '') }}" required>
                @if($errors->has('nuevo'))
                    <span class="text-danger">{{ $errors->first('nuevo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.idiomasgestionhumana.fields.nuevo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nivel">{{ trans('cruds.idiomasgestionhumana.fields.nivel') }}</label>
                <input class="form-control {{ $errors->has('nivel') ? 'is-invalid' : '' }}" type="text" name="nivel" id="nivel" value="{{ old('nivel', '') }}">
                @if($errors->has('nivel'))
                    <span class="text-danger">{{ $errors->first('nivel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.idiomasgestionhumana.fields.nivel_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.idiomasgestionhumana.fields.cetificacion') }}</label>
                @foreach(App\Models\Idiomasgestionhumana::CETIFICACION_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('cetificacion') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="cetificacion_{{ $key }}" name="cetificacion" value="{{ $key }}" {{ old('cetificacion', '1') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="cetificacion_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('cetificacion'))
                    <span class="text-danger">{{ $errors->first('cetificacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.idiomasgestionhumana.fields.cetificacion_helper') }}</span>
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