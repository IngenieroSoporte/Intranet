@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.proyectosArticulado.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.proyectos-articulados.update", [$proyectosArticulado->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="titulo_del_trabajo">{{ trans('cruds.proyectosArticulado.fields.titulo_del_trabajo') }}</label>
                <input class="form-control {{ $errors->has('titulo_del_trabajo') ? 'is-invalid' : '' }}" type="text" name="titulo_del_trabajo" id="titulo_del_trabajo" value="{{ old('titulo_del_trabajo', $proyectosArticulado->titulo_del_trabajo) }}" required>
                @if($errors->has('titulo_del_trabajo'))
                    <span class="text-danger">{{ $errors->first('titulo_del_trabajo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.titulo_del_trabajo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombres_y_apellidos_de_los_autores_de_la_investigacion">{{ trans('cruds.proyectosArticulado.fields.nombres_y_apellidos_de_los_autores_de_la_investigacion') }}</label>
                <input class="form-control {{ $errors->has('nombres_y_apellidos_de_los_autores_de_la_investigacion') ? 'is-invalid' : '' }}" type="text" name="nombres_y_apellidos_de_los_autores_de_la_investigacion" id="nombres_y_apellidos_de_los_autores_de_la_investigacion" value="{{ old('nombres_y_apellidos_de_los_autores_de_la_investigacion', $proyectosArticulado->nombres_y_apellidos_de_los_autores_de_la_investigacion) }}" required>
                @if($errors->has('nombres_y_apellidos_de_los_autores_de_la_investigacion'))
                    <span class="text-danger">{{ $errors->first('nombres_y_apellidos_de_los_autores_de_la_investigacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.nombres_y_apellidos_de_los_autores_de_la_investigacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombres_y_apellidos_del_asesor_del_trabajo">{{ trans('cruds.proyectosArticulado.fields.nombres_y_apellidos_del_asesor_del_trabajo') }}</label>
                <input class="form-control {{ $errors->has('nombres_y_apellidos_del_asesor_del_trabajo') ? 'is-invalid' : '' }}" type="text" name="nombres_y_apellidos_del_asesor_del_trabajo" id="nombres_y_apellidos_del_asesor_del_trabajo" value="{{ old('nombres_y_apellidos_del_asesor_del_trabajo', $proyectosArticulado->nombres_y_apellidos_del_asesor_del_trabajo) }}" required>
                @if($errors->has('nombres_y_apellidos_del_asesor_del_trabajo'))
                    <span class="text-danger">{{ $errors->first('nombres_y_apellidos_del_asesor_del_trabajo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.nombres_y_apellidos_del_asesor_del_trabajo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ano_en_que_se_realizo_la_investigacion">{{ trans('cruds.proyectosArticulado.fields.ano_en_que_se_realizo_la_investigacion') }}</label>
                <input class="form-control date {{ $errors->has('ano_en_que_se_realizo_la_investigacion') ? 'is-invalid' : '' }}" type="text" name="ano_en_que_se_realizo_la_investigacion" id="ano_en_que_se_realizo_la_investigacion" value="{{ old('ano_en_que_se_realizo_la_investigacion', $proyectosArticulado->ano_en_que_se_realizo_la_investigacion) }}" required>
                @if($errors->has('ano_en_que_se_realizo_la_investigacion'))
                    <span class="text-danger">{{ $errors->first('ano_en_que_se_realizo_la_investigacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.ano_en_que_se_realizo_la_investigacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="linea_de_investigacion">{{ trans('cruds.proyectosArticulado.fields.linea_de_investigacion') }}</label>
                <input class="form-control {{ $errors->has('linea_de_investigacion') ? 'is-invalid' : '' }}" type="text" name="linea_de_investigacion" id="linea_de_investigacion" value="{{ old('linea_de_investigacion', $proyectosArticulado->linea_de_investigacion) }}" required>
                @if($errors->has('linea_de_investigacion'))
                    <span class="text-danger">{{ $errors->first('linea_de_investigacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.linea_de_investigacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="abstract_resumen_documental">{{ trans('cruds.proyectosArticulado.fields.abstract_resumen_documental') }}</label>
                <textarea class="form-control {{ $errors->has('abstract_resumen_documental') ? 'is-invalid' : '' }}" name="abstract_resumen_documental" id="abstract_resumen_documental" required>{{ old('abstract_resumen_documental', $proyectosArticulado->abstract_resumen_documental) }}</textarea>
                @if($errors->has('abstract_resumen_documental'))
                    <span class="text-danger">{{ $errors->first('abstract_resumen_documental') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.abstract_resumen_documental_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="palabras_clave">{{ trans('cruds.proyectosArticulado.fields.palabras_clave') }}</label>
                <input class="form-control {{ $errors->has('palabras_clave') ? 'is-invalid' : '' }}" type="text" name="palabras_clave" id="palabras_clave" value="{{ old('palabras_clave', $proyectosArticulado->palabras_clave) }}" required>
                @if($errors->has('palabras_clave'))
                    <span class="text-danger">{{ $errors->first('palabras_clave') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.palabras_clave_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="proyecto">{{ trans('cruds.proyectosArticulado.fields.proyecto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('proyecto') ? 'is-invalid' : '' }}" id="proyecto-dropzone">
                </div>
                @if($errors->has('proyecto'))
                    <span class="text-danger">{{ $errors->first('proyecto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.proyecto_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.proyectosArticulado.fields.publicar') }}</label>
                @foreach(App\Models\ProyectosArticulado::PUBLICAR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('publicar') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="publicar_{{ $key }}" name="publicar" value="{{ $key }}" {{ old('publicar', $proyectosArticulado->publicar) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="publicar_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('publicar'))
                    <span class="text-danger">{{ $errors->first('publicar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.publicar_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.proyectoDropzone = {
    url: '{{ route('admin.proyectos-articulados.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="proyecto"]').remove()
      $('form').append('<input type="hidden" name="proyecto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="proyecto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($proyectosArticulado) && $proyectosArticulado->proyecto)
      var file = {!! json_encode($proyectosArticulado->proyecto) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="proyecto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection