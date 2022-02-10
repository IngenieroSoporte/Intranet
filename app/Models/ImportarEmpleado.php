<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportarEmpleado extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public $table = 'importar_empleados';

    protected $dates = [
        'fecha_de_inicio_contrato_actual',
        'created_at',
        'fecha_inicial_del_primero_contrato',
        'fecha_final_del_primero_contrato',
        'fecha_inicial_del_segundo_contrato',
        'fecha_final_del_segundo_contrato',
        'fecha_final_del_tercer_contrato',
        'fecha_inicial_del_cuarto_contrato',
        'fecha_final_del_cuarto_contrato',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'cedula',
        'lugar_de_expedicion_de_la_cedula',
        'cargo_actual',
        'fecha_de_inicio_contrato_actual',
        'salario',
        'salario_en_letras',
        'created_at',
        'fecha_inicial_del_primero_contrato',
        'fecha_final_del_primero_contrato',
        'fecha_inicial_del_segundo_contrato',
        'fecha_final_del_segundo_contrato',
        'fecha_inicial_del_tercer_contrato',
        'fecha_final_del_tercer_contrato',
        'fecha_inicial_del_cuarto_contrato',
        'fecha_final_del_cuarto_contrato',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function getFechaDeInicioContratoActualAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeInicioContratoActualAttribute($value)
    {
        $this->attributes['fecha_de_inicio_contrato_actual'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaInicialDelPrimeroContratoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaInicialDelPrimeroContratoAttribute($value)
    {
        $this->attributes['fecha_inicial_del_primero_contrato'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaFinalDelPrimeroContratoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaFinalDelPrimeroContratoAttribute($value)
    {
        $this->attributes['fecha_final_del_primero_contrato'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaInicialDelSegundoContratoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaInicialDelSegundoContratoAttribute($value)
    {
        $this->attributes['fecha_inicial_del_segundo_contrato'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaFinalDelSegundoContratoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaFinalDelSegundoContratoAttribute($value)
    {
        $this->attributes['fecha_final_del_segundo_contrato'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaFinalDelTercerContratoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaFinalDelTercerContratoAttribute($value)
    {
        $this->attributes['fecha_final_del_tercer_contrato'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaInicialDelCuartoContratoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaInicialDelCuartoContratoAttribute($value)
    {
        $this->attributes['fecha_inicial_del_cuarto_contrato'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaFinalDelCuartoContratoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaFinalDelCuartoContratoAttribute($value)
    {
        $this->attributes['fecha_final_del_cuarto_contrato'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
