@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.candidato.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.candidatos.update", [$candidato->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="vacante_a_la_que_se_postula_id">{{ trans('cruds.candidato.fields.vacante_a_la_que_se_postula') }}</label>
                <select class="form-control select2 {{ $errors->has('vacante_a_la_que_se_postula') ? 'is-invalid' : '' }}" name="vacante_a_la_que_se_postula_id" id="vacante_a_la_que_se_postula_id">
                    @foreach($vacante_a_la_que_se_postulas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('vacante_a_la_que_se_postula_id') ? old('vacante_a_la_que_se_postula_id') : $candidato->vacante_a_la_que_se_postula->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vacante_a_la_que_se_postula'))
                    <span class="text-danger">{{ $errors->first('vacante_a_la_que_se_postula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.vacante_a_la_que_se_postula_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="primer_apellido">{{ trans('cruds.candidato.fields.primer_apellido') }}</label>
                <input class="form-control {{ $errors->has('primer_apellido') ? 'is-invalid' : '' }}" type="text" name="primer_apellido" id="primer_apellido" value="{{ old('primer_apellido', $candidato->primer_apellido) }}" required>
                @if($errors->has('primer_apellido'))
                    <span class="text-danger">{{ $errors->first('primer_apellido') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.primer_apellido_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="segundo_apellido">{{ trans('cruds.candidato.fields.segundo_apellido') }}</label>
                <input class="form-control {{ $errors->has('segundo_apellido') ? 'is-invalid' : '' }}" type="text" name="segundo_apellido" id="segundo_apellido" value="{{ old('segundo_apellido', $candidato->segundo_apellido) }}" required>
                @if($errors->has('segundo_apellido'))
                    <span class="text-danger">{{ $errors->first('segundo_apellido') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.segundo_apellido_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombres">{{ trans('cruds.candidato.fields.nombres') }}</label>
                <input class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}" type="text" name="nombres" id="nombres" value="{{ old('nombres', $candidato->nombres) }}" required>
                @if($errors->has('nombres'))
                    <span class="text-danger">{{ $errors->first('nombres') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.nombres_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.candidato.fields.documento_de_identidad') }}</label>
                @foreach(App\Models\Candidato::DOCUMENTO_DE_IDENTIDAD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('documento_de_identidad') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="documento_de_identidad_{{ $key }}" name="documento_de_identidad" value="{{ $key }}" {{ old('documento_de_identidad', $candidato->documento_de_identidad) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="documento_de_identidad_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('documento_de_identidad'))
                    <span class="text-danger">{{ $errors->first('documento_de_identidad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.documento_de_identidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_de_identificacion">{{ trans('cruds.candidato.fields.no_de_identificacion') }}</label>
                <input class="form-control {{ $errors->has('no_de_identificacion') ? 'is-invalid' : '' }}" type="number" name="no_de_identificacion" id="no_de_identificacion" value="{{ old('no_de_identificacion', $candidato->no_de_identificacion) }}" step="0.1" required>
                @if($errors->has('no_de_identificacion'))
                    <span class="text-danger">{{ $errors->first('no_de_identificacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.no_de_identificacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_de_expedicion_del_documento">{{ trans('cruds.candidato.fields.fecha_de_expedicion_del_documento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_expedicion_del_documento') ? 'is-invalid' : '' }}" type="text" name="fecha_de_expedicion_del_documento" id="fecha_de_expedicion_del_documento" value="{{ old('fecha_de_expedicion_del_documento', $candidato->fecha_de_expedicion_del_documento) }}" required>
                @if($errors->has('fecha_de_expedicion_del_documento'))
                    <span class="text-danger">{{ $errors->first('fecha_de_expedicion_del_documento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.fecha_de_expedicion_del_documento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_de_nacimiento">{{ trans('cruds.candidato.fields.fecha_de_nacimiento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_nacimiento') ? 'is-invalid' : '' }}" type="text" name="fecha_de_nacimiento" id="fecha_de_nacimiento" value="{{ old('fecha_de_nacimiento', $candidato->fecha_de_nacimiento) }}" required>
                @if($errors->has('fecha_de_nacimiento'))
                    <span class="text-danger">{{ $errors->first('fecha_de_nacimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.fecha_de_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="departamento_de_nacimiento">{{ trans('cruds.candidato.fields.departamento_de_nacimiento') }}</label>
                <input class="form-control {{ $errors->has('departamento_de_nacimiento') ? 'is-invalid' : '' }}" type="text" name="departamento_de_nacimiento" id="departamento_de_nacimiento" value="{{ old('departamento_de_nacimiento', $candidato->departamento_de_nacimiento) }}" required>
                @if($errors->has('departamento_de_nacimiento'))
                    <span class="text-danger">{{ $errors->first('departamento_de_nacimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.departamento_de_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ciudad_de_nacimiento">{{ trans('cruds.candidato.fields.ciudad_de_nacimiento') }}</label>
                <input class="form-control {{ $errors->has('ciudad_de_nacimiento') ? 'is-invalid' : '' }}" type="text" name="ciudad_de_nacimiento" id="ciudad_de_nacimiento" value="{{ old('ciudad_de_nacimiento', $candidato->ciudad_de_nacimiento) }}" required>
                @if($errors->has('ciudad_de_nacimiento'))
                    <span class="text-danger">{{ $errors->first('ciudad_de_nacimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.ciudad_de_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="direccion">{{ trans('cruds.candidato.fields.direccion') }}</label>
                <input class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" type="text" name="direccion" id="direccion" value="{{ old('direccion', $candidato->direccion) }}" required>
                @if($errors->has('direccion'))
                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.direccion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono_personal">{{ trans('cruds.candidato.fields.telefono_personal') }}</label>
                <input class="form-control {{ $errors->has('telefono_personal') ? 'is-invalid' : '' }}" type="text" name="telefono_personal" id="telefono_personal" value="{{ old('telefono_personal', $candidato->telefono_personal) }}" required>
                @if($errors->has('telefono_personal'))
                    <span class="text-danger">{{ $errors->first('telefono_personal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.telefono_personal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="celular_personal">{{ trans('cruds.candidato.fields.celular_personal') }}</label>
                <input class="form-control {{ $errors->has('celular_personal') ? 'is-invalid' : '' }}" type="text" name="celular_personal" id="celular_personal" value="{{ old('celular_personal', $candidato->celular_personal) }}" required>
                @if($errors->has('celular_personal'))
                    <span class="text-danger">{{ $errors->first('celular_personal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.celular_personal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_personal">{{ trans('cruds.candidato.fields.email_personal') }}</label>
                <input class="form-control {{ $errors->has('email_personal') ? 'is-invalid' : '' }}" type="email" name="email_personal" id="email_personal" value="{{ old('email_personal', $candidato->email_personal) }}" required>
                @if($errors->has('email_personal'))
                    <span class="text-danger">{{ $errors->first('email_personal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.email_personal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono_familiar">{{ trans('cruds.candidato.fields.telefono_familiar') }}</label>
                <input class="form-control {{ $errors->has('telefono_familiar') ? 'is-invalid' : '' }}" type="text" name="telefono_familiar" id="telefono_familiar" value="{{ old('telefono_familiar', $candidato->telefono_familiar) }}" required>
                @if($errors->has('telefono_familiar'))
                    <span class="text-danger">{{ $errors->first('telefono_familiar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.telefono_familiar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="celular_familiar">{{ trans('cruds.candidato.fields.celular_familiar') }}</label>
                <input class="form-control {{ $errors->has('celular_familiar') ? 'is-invalid' : '' }}" type="text" name="celular_familiar" id="celular_familiar" value="{{ old('celular_familiar', $candidato->celular_familiar) }}" required>
                @if($errors->has('celular_familiar'))
                    <span class="text-danger">{{ $errors->first('celular_familiar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.celular_familiar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_familiar">{{ trans('cruds.candidato.fields.email_familiar') }}</label>
                <input class="form-control {{ $errors->has('email_familiar') ? 'is-invalid' : '' }}" type="email" name="email_familiar" id="email_familiar" value="{{ old('email_familiar', $candidato->email_familiar) }}" required>
                @if($errors->has('email_familiar'))
                    <span class="text-danger">{{ $errors->first('email_familiar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.email_familiar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="secundaria">{{ trans('cruds.candidato.fields.secundaria') }}</label>
                <input class="form-control {{ $errors->has('secundaria') ? 'is-invalid' : '' }}" type="text" name="secundaria" id="secundaria" value="{{ old('secundaria', $candidato->secundaria) }}">
                @if($errors->has('secundaria'))
                    <span class="text-danger">{{ $errors->first('secundaria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.secundaria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="media">{{ trans('cruds.candidato.fields.media') }}</label>
                <input class="form-control {{ $errors->has('media') ? 'is-invalid' : '' }}" type="text" name="media" id="media" value="{{ old('media', $candidato->media) }}">
                @if($errors->has('media'))
                    <span class="text-danger">{{ $errors->first('media') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.media_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titulo_obtenido">{{ trans('cruds.candidato.fields.titulo_obtenido') }}</label>
                <input class="form-control {{ $errors->has('titulo_obtenido') ? 'is-invalid' : '' }}" type="text" name="titulo_obtenido" id="titulo_obtenido" value="{{ old('titulo_obtenido', $candidato->titulo_obtenido) }}">
                @if($errors->has('titulo_obtenido'))
                    <span class="text-danger">{{ $errors->first('titulo_obtenido') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.titulo_obtenido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_de_graduacion">{{ trans('cruds.candidato.fields.fecha_de_graduacion') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_graduacion') ? 'is-invalid' : '' }}" type="text" name="fecha_de_graduacion" id="fecha_de_graduacion" value="{{ old('fecha_de_graduacion', $candidato->fecha_de_graduacion) }}">
                @if($errors->has('fecha_de_graduacion'))
                    <span class="text-danger">{{ $errors->first('fecha_de_graduacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.fecha_de_graduacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="formacion_academica_profesionals">{{ trans('cruds.candidato.fields.formacion_academica_profesional') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('formacion_academica_profesionals') ? 'is-invalid' : '' }}" name="formacion_academica_profesionals[]" id="formacion_academica_profesionals" multiple>
                    @foreach($formacion_academica_profesionals as $id => $formacion_academica_profesional)
                        <option value="{{ $id }}" {{ (in_array($id, old('formacion_academica_profesionals', [])) || $candidato->formacion_academica_profesionals->contains($id)) ? 'selected' : '' }}>{{ $formacion_academica_profesional }}</option>
                    @endforeach
                </select>
                @if($errors->has('formacion_academica_profesionals'))
                    <span class="text-danger">{{ $errors->first('formacion_academica_profesionals') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.formacion_academica_profesional_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="idiomas">{{ trans('cruds.candidato.fields.idioma') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('idiomas') ? 'is-invalid' : '' }}" name="idiomas[]" id="idiomas" multiple>
                    @foreach($idiomas as $id => $idioma)
                        <option value="{{ $id }}" {{ (in_array($id, old('idiomas', [])) || $candidato->idiomas->contains($id)) ? 'selected' : '' }}>{{ $idioma }}</option>
                    @endforeach
                </select>
                @if($errors->has('idiomas'))
                    <span class="text-danger">{{ $errors->first('idiomas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.idioma_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ofimaticas">{{ trans('cruds.candidato.fields.ofimatica') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ofimaticas') ? 'is-invalid' : '' }}" name="ofimaticas[]" id="ofimaticas" multiple>
                    @foreach($ofimaticas as $id => $ofimatica)
                        <option value="{{ $id }}" {{ (in_array($id, old('ofimaticas', [])) || $candidato->ofimaticas->contains($id)) ? 'selected' : '' }}>{{ $ofimatica }}</option>
                    @endforeach
                </select>
                @if($errors->has('ofimaticas'))
                    <span class="text-danger">{{ $errors->first('ofimaticas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.ofimatica_helper') }}</span>
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