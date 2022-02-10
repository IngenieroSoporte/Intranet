@extends('layouts.admin')
@section('content')
@can('formacion_academica_profesional_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success ml-3" href="{{ route('admin.formacion-academica-profesionals.create') }}">
                {{ trans('global.add') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.formacionAcademicaProfesional.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-FormacionAcademicaProfesional">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.formacionAcademicaProfesional.fields.titulo') }}
                    </th>
                    <th>
                        {{ trans('cruds.formacionAcademicaProfesional.fields.numero_de_semestres') }}
                    </th>
                    <th>
                        {{ trans('cruds.formacionAcademicaProfesional.fields.graduado') }}
                    </th>
                    <th>
                        {{ trans('cruds.formacionAcademicaProfesional.fields.fecha_de_graduacion') }}
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
@can('formacion_academica_profesional_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.formacion-academica-profesionals.massDestroy') }}",
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
    ajax: "{{ route('admin.formacion-academica-profesionals.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'titulo', name: 'titulo' },
{ data: 'numero_de_semestres', name: 'numero_de_semestres' },
{ data: 'graduado', name: 'graduado' },
{ data: 'fecha_de_graduacion', name: 'fecha_de_graduacion' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-FormacionAcademicaProfesional').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection