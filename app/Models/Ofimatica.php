<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ofimatica extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const CETIFICACION_RADIO = [
        '1' => 'si',
        '0' => 'no',
    ];

    public $table = 'ofimaticas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nuevo',
        'nivel',
        'cetificacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
