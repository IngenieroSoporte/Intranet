<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormacionAcademicaProfesional extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const GRADUADO_RADIO = [
        'si' => 'si',
        'no' => 'no',
    ];

    public $table = 'formacion_academica_profesionals';

    protected $dates = [
        'fecha_de_graduacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'titulo',
        'numero_de_semestres',
        'graduado',
        'fecha_de_graduacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getFechaDeGraduacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeGraduacionAttribute($value)
    {
        $this->attributes['fecha_de_graduacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
