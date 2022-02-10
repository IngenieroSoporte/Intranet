<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProyectosArticulado extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const PUBLICAR_RADIO = [
        '1' => 'ON',
        '0' => 'OFF',
    ];

    public $table = 'proyectos_articulados';

    protected $appends = [
        'proyecto',
    ];

    protected $dates = [
        'ano_en_que_se_realizo_la_investigacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'titulo_del_trabajo',
        'nombres_y_apellidos_de_los_autores_de_la_investigacion',
        'nombres_y_apellidos_del_asesor_del_trabajo',
        'ano_en_que_se_realizo_la_investigacion',
        'linea_de_investigacion',
        'abstract_resumen_documental',
        'palabras_clave',
        'publicar',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getAnoEnQueSeRealizoLaInvestigacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAnoEnQueSeRealizoLaInvestigacionAttribute($value)
    {
        $this->attributes['ano_en_que_se_realizo_la_investigacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getProyectoAttribute()
    {
        return $this->getMedia('proyecto')->last();
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
