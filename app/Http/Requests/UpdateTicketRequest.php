<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTicketRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ticket_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'correo' => [
                'required',
            ],
            'area' => [
                'required',
            ],
            'id_incidente_id' => [
                'required',
                'integer',
            ],
            'id_prioridad_id' => [
                'required',
                'integer',
            ],
            'id_sede_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
