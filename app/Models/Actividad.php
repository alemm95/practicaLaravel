<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table="actividades";
    protected $primaryKey="id";

    protected $fillable = [
        'name',
        'descripcion',
        'aforo',
    ];

    public function tramos()
    {
        return $this->hasMany('App\Models\Tramo');
    }

}
