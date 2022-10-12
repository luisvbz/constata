<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SunarpTarjeta extends Model
{
    use HasFactory;

    protected $table = 'sunarp_tarjetas';
    protected $fillable = [
        'pais',
        'entidad',
        'titulo',
        'codigo_verificacion',
        'num_publicidad',
        'num_titulo',
        'anio_titulo',
        'zona_registral',
        'sede_registral',
        'placa',
        'placa_anterior',
        'partida_registral',
        'DUA_DAM',
        'categoria',
        'marca',
        'modelo',
        'color1',
        'color2',
        'color3',
        'VIM',
        'serie_chasis',
        'num_motor',
        'carroceria',
        'potencia_motor',
        'form_rodante',
        'combustible',
        'version',
        'anio_fabricacion',
        'anio_modelo',
        'asientos',
        'pasajeros',
        'ruedas',
        'ejes',
        'cilindros',
        'longitud',
        'altura',
        'ancho',
        'cilindrada',
        'peso_bruto',
        'peso_neto',
        'carga_util',
        'condicion',
        'firma',
        'firma_file',
        'firma_id',
        'fecha',
    ];

    public function firmaGuardada()
    {
        return $this->belongsTo(SunarpFirma::class, 'firma_id');
    }
}
