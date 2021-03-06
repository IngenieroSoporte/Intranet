@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ticket.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tickets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.nombre') }}
                        </th>
                        <td>
                            {{ $ticket->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.correo') }}
                        </th>
                        <td>
                            {{ $ticket->correo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.area') }}
                        </th>
                        <td>
                            {{ App\Models\Ticket::AREA_RADIO[$ticket->area] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.id_incidente') }}
                        </th>
                        <td>
                            {{ $ticket->id_incidente->tipo_de_incidente ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.id_prioridad') }}
                        </th>
                        <td>
                            {{ $ticket->id_prioridad->tipo_de_prioridad ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.id_sede') }}
                        </th>
                        <td>
                            {{ $ticket->id_sede->sede ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.comentenos_mas_sobre_su_incidencia') }}
                        </th>
                        <td>
                            {!! $ticket->comentenos_mas_sobre_su_incidencia !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.adjuntar_archivo') }}
                        </th>
                        <td>
                            @if($ticket->adjuntar_archivo)
                                <a href="{{ $ticket->adjuntar_archivo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.id_asignado') }}
                        </th>
                        <td>
                            {{ $ticket->id_asignado->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.solucion') }}
                        </th>
                        <td>
                            {!! $ticket->solucion !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\Ticket::ESTADO_RADIO[$ticket->estado] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tickets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection