@extends('layouts.admin')
@section('content')
@can('ticket_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tickets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ticket.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ticket.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Ticket">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.nombre') }}
                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.correo') }}
                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.area') }}
                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.id_incidente') }}
                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.id_prioridad') }}
                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.id_sede') }}
                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.adjuntar_archivo') }}
                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.id_asignado') }}
                    </th>
                    <th>
                        {{ trans('cruds.agente.fields.correo') }}
                    </th>
                    <th>
                        {{ trans('cruds.ticket.fields.estado') }}
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
@can('ticket_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tickets.massDestroy') }}",
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
    ajax: "{{ route('admin.tickets.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'nombre', name: 'nombre' },
{ data: 'correo', name: 'correo' },
{ data: 'area', name: 'area' },
{ data: 'id_incidente_tipo_de_incidente', name: 'id_incidente.tipo_de_incidente' },
{ data: 'id_prioridad_tipo_de_prioridad', name: 'id_prioridad.tipo_de_prioridad' },
{ data: 'id_sede_sede', name: 'id_sede.sede' },
{ data: 'adjuntar_archivo', name: 'adjuntar_archivo', sortable: false, searchable: false },
{ data: 'id_asignado_nombre', name: 'id_asignado.nombre' },
{ data: 'id_asignado.correo', name: 'id_asignado.correo' },
{ data: 'estado', name: 'estado' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Ticket').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection