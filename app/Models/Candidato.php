<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use Auditable;
    use HasFactory;

    public const DOCUMENTO_DE_IDENTIDAD_RADIO = [
        'cc' => 'C.C',
        'ce' => 'C.E',
    ];

    public $table = 'candidatos';

    protected $dates = [
        'fecha_de_expedicion_del_documento',
        'fecha_de_nacimiento',
        'fecha_de_graduacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'vacante_a_la_que_se_postula_id',
        'primer_apellido',
        'segundo_apellido',
        'nombres',
        'documento_de_identidad',
        'no_de_identificacion',
        'fecha_de_expedicion_del_documento',
        'fecha_de_nacimiento',
        'departamento_de_nacimiento',
        'ciudad_de_nacimiento',
        'direccion',
        'telefono_personal',
        'celular_personal',
        'email_personal',
        'telefono_familiar',
        'celular_familiar',
        'email_familiar',
        'secundaria',
        'media',
        'titulo_obtenido',
        'fecha_de_graduacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function vacante_a_la_que_se_postula()
    {
        return $this->belongsTo(Empleo::class, 'vacante_a_la_que_se_postula_id');
    }

    public function getFechaDeExpedicionDelDocumentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeExpedicionDelDocumentoAttribute($value)
    {
        $this->attributes['fecha_de_expedicion_del_documento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeNacimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeNacimientoAttribute($value)
    {
        $this->attributes['fecha_de_nacimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeGraduacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeGraduacionAttribute($value)
    {
        $this->attributes['fecha_de_graduacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function formacion_academica_profesionals()
    {
        return $this->belongsToMany(FormacionAcademicaProfesional::class);
    }

    public function idiomas()
    {
        return $this->belongsToMany(Idiomasgestionhumana::class);
    }

    public function ofimaticas()
    {
        return $this->belongsToMany(Ofimatica::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
