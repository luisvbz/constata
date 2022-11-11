<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dni extends Model
{
    use HasFactory;

    protected $table = 'dnis';
    public $timestamps = false;
    protected $fillable = [
        'numero_documento',
        'numero_verificacion',
        'primer_apellido',
        'segundo_apellido',
        'pre_nombres',
        'fecha_nacimiento',
        'ubigeo',
        'sexo',
        'estado_civil',
        'fecha_incripcion',
        'fecha_emision',
        'fecha_caducidad',
        'departamento',
        'provincia',
        'distrito',
        'direccion',
        'donante',
        'grupo_votacion',
        'foto',
        'huella',
        'firma',
        'fecha_creacion',
    ];
}
