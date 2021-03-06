@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salario.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.salarios.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nuevo">{{ trans('cruds.salario.fields.nuevo') }}</label>
                <input class="form-control {{ $errors->has('nuevo') ? 'is-invalid' : '' }}" type="text" name="nuevo" id="nuevo" value="{{ old('nuevo', '') }}" required>
                @if($errors->has('nuevo'))
                    <span class="text-danger">{{ $errors->first('nuevo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salario.fields.nuevo_helper') }}</span>
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