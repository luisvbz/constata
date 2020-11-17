<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'placa',
        'codigo',
        'vigente_desde',
        'vigente_hasta',
        'resultado_inspeccion',
        'empresa',
        'direccion',
        'ambito',
        'servicio',
    ];
}
