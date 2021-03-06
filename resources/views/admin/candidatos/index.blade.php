@extends('layouts.admin')
@section('content')
@can('candidato_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.candidatos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.candidato.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.candidato.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Candidato">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.vacante_a_la_que_se_postula') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.primer_apellido') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.segundo_apellido') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.nombres') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.documento_de_identidad') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.no_de_identificacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.telefono_personal') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.telefono_familiar') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.formacion_academica_profesional') }}
                    </th>
                    <th>
                        {{ trans('cruds.candidato.fields.ofimatica') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('candidato_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.candidatos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.candidatos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'vacante_a_la_que_se_postula_vacante', name: 'vacante_a_la_que_se_postula.vacante' },
{ data: 'primer_apellido', name: 'primer_apellido' },
{ data: 'segundo_apellido', name: 'segundo_apellido' },
{ data: 'nombres', name: 'nombres' },
{ data: 'documento_de_identidad', name: 'documento_de_identidad' },
{ data: 'no_de_identificacion', name: 'no_de_identificacion' },
{ data: 'telefono_personal', name: 'telefono_personal' },
{ data: 'telefono_familiar', name: 'telefono_familiar' },
{ data: 'formacion_academica_profesional', name: 'formacion_academica_profesionals.titulo' },
{ data: 'ofimatica', name: 'ofimaticas.nuevo' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Candidato').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection