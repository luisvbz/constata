<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SunarpCabecera extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'sunarp_cabeceras';
    protected $fillable = [
        'pais',
        'entidad',
        'titulo',
        'codigo_verificacion',
        'partida_registral',
        'num_titulo',
    ];
}
