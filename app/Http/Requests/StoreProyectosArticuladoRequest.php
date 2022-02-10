<?php

namespace App\Http\Requests;

use App\Models\ProyectosArticulado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProyectosArticuladoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proyectos_articulado_create');
    }

    public function rules()
    {
        return [
            'titulo_del_trabajo' => [
                'string',
                'required',
            ],
            'nombres_y_apellidos_de_los_autores_de_la_investigacion' => [
                'string',
                'required',
            ],
            'nombres_y_apellidos_del_asesor_del_trabajo' => [
                'string',
                'required',
            ],
            'ano_en_que_se_realizo_la_investigacion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'linea_de_investigacion' => [
                'string',
                'required',
            ],
            'abstract_resumen_documental' => [
                'required',
            ],
            'palabras_clave' => [
                'string',
                'required',
            ],
        ];
    }
}
