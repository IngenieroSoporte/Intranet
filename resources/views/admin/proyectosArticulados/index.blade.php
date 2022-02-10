@extends('layouts.admin')
@section('content')
@can('proyectos_articulado_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.proyectos-articulados.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.proyectosArticulado.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.proyectosArticulado.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ProyectosArticulado">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.proyectosArticulado.fields.titulo_del_trabajo') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyectosArticulado.fields.nombres_y_apellidos_de_los_autores_de_la_investigacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyectosArticulado.fields.nombres_y_apellidos_del_asesor_del_trabajo') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyectosArticulado.fields.ano_en_que_se_realizo_la_investigacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyectosArticulado.fields.linea_de_investigacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.proyectosArticulado.fields.proyecto') }}
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
@can('proyectos_articulado_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.proyectos-articulados.massDestroy') }}",
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
    ajax: "{{ route('admin.proyectos-articulados.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'titulo_del_trabajo', name: 'titulo_del_trabajo' },
{ data: 'nombres_y_apellidos_de_los_autores_de_la_investigacion', name: 'nombres_y_apellidos_de_los_autores_de_la_investigacion' },
{ data: 'nombres_y_apellidos_del_asesor_del_trabajo', name: 'nombres_y_apellidos_del_asesor_del_trabajo' },
{ data: 'ano_en_que_se_realizo_la_investigacion', name: 'ano_en_que_se_realizo_la_investigacion' },
{ data: 'linea_de_investigacion', name: 'linea_de_investigacion' },
{ data: 'proyecto', name: 'proyecto', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-ProyectosArticulado').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection