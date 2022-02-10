<div class="m-3">
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
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-vacanteALaQueSePostulaCandidatos">
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
                    <tbody>
                        @foreach($candidatos as $key => $candidato)
                            <tr data-entry-id="{{ $candidato->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $candidato->vacante_a_la_que_se_postula->vacante ?? '' }}
                                </td>
                                <td>
                                    {{ $candidato->primer_apellido ?? '' }}
                                </td>
                                <td>
                                    {{ $candidato->segundo_apellido ?? '' }}
                                </td>
                                <td>
                                    {{ $candidato->nombres ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Candidato::DOCUMENTO_DE_IDENTIDAD_RADIO[$candidato->documento_de_identidad] ?? '' }}
                                </td>
                                <td>
                                    {{ $candidato->no_de_identificacion ?? '' }}
                                </td>
                                <td>
                                    {{ $candidato->telefono_personal ?? '' }}
                                </td>
                                <td>
                                    {{ $candidato->telefono_familiar ?? '' }}
                                </td>
                                <td>
                                    @foreach($candidato->formacion_academica_profesionals as $key => $item)
                                        <span class="badge badge-info">{{ $item->titulo }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($candidato->ofimaticas as $key => $item)
                                        <span class="badge badge-info">{{ $item->nuevo }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('candidato_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.candidatos.show', $candidato->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('candidato_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.candidatos.edit', $candidato->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('candidato_delete')
                                        <form action="{{ route('admin.candidatos.destroy', $candidato->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('candidato_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.candidatos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-vacanteALaQueSePostulaCandidatos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection