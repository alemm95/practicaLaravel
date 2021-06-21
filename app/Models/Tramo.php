<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramo extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'hora_inicio',
        'hora_fin',
        'actividad_id',
        'fecha_alta',
        'fecha_baja',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    public function actividad()
    {
        return $this->belongsTo('App\Models\Actividad');
    }
}
