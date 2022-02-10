@extends('layouts.admin')
@section('content')
@can('documentos_candidato_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.documentos-candidatos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.documentosCandidato.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.documentosCandidato.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-DocumentosCandidato">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.documentosCandidato.fields.no_de_cedula') }}
                    </th>
                    <th>
                        {{ trans('cruds.documentosCandidato.fields.fotocopia_de_la_cedula') }}
                    </th>
                    <th>
                        {{ trans('cruds.documentosCandidato.fields.acta_de_grado') }}
                    </th>
                    <th>
                        {{ trans('cruds.documentosCandidato.fields.certificaciones') }}
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
@can('documentos_candidato_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documentos-candidatos.massDestroy') }}",
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
    ajax: "{{ route('admin.documentos-candidatos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'no_de_cedula', name: 'no_de_cedula' },
{ data: 'fotocopia_de_la_cedula', name: 'fotocopia_de_la_cedula', sortable: false, searchable: false },
{ data: 'acta_de_grado', name: 'acta_de_grado', sortable: false, searchable: false },
{ data: 'certificaciones', name: 'certificaciones', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-DocumentosCandidato').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection