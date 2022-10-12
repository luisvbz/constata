<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SunarpFirma extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'sunarp_firmas';
    protected $fillable = [
        'nombre_firma',
        'firma',
        'firma_file',
        'predeterminada',
    ];
}
