@extends('layouts.admin')
@section('content')
@can('importar_empleado_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.importar-empleados.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.importarEmpleado.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ImportarEmpleado', 'route' => 'admin.importar-empleados.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.importarEmpleado.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ImportarEmpleado">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.importarEmpleado.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.importarEmpleado.fields.nombre') }}
                    </th>
                    <th>
                        {{ trans('cruds.importarEmpleado.fields.cedula') }}
                    </th>
                    <th>
                        {{ trans('cruds.importarEmpleado.fields.lugar_de_expedicion_de_la_cedula') }}
                    </th>
                    <th>
                        {{ trans('cruds.importarEmpleado.fields.cargo_actual') }}
                    </th>
                    <th>
                        {{ trans('cruds.importarEmpleado.fields.fecha_de_inicio_contrato_actual') }}
                    </th>
                    <th>
                        {{ trans('cruds.importarEmpleado.fields.salario') }}
                    </th>
                    <th>
                        {{ trans('cruds.importarEmpleado.fields.salario_en_letras') }}
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
@can('importar_empleado_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.importar-empleados.massDestroy') }}",
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
    ajax: "{{ route('admin.importar-empleados.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'nombre', name: 'nombre' },
{ data: 'cedula', name: 'cedula' },
{ data: 'lugar_de_expedicion_de_la_cedula', name: 'lugar_de_expedicion_de_la_cedula' },
{ data: 'cargo_actual', name: 'cargo_actual' },
{ data: 'fecha_de_inicio_contrato_actual', name: 'fecha_de_inicio_contrato_actual' },
{ data: 'salario', name: 'salario' },
{ data: 'salario_en_letras', name: 'salario_en_letras' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-ImportarEmpleado').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection