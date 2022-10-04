<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSunarpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sunarp_cabeceras', function (Blueprint $table) {
            $table->id();
            $table->string('pais');
            $table->string('entidad');
            $table->string('titulo');
            $table->string('firma')->nullable();
        });
        Schema::create('sunarp_tarjetas', function (Blueprint $table) {
            $table->id();
            $table->string('pais');
            $table->string('entidad');
            $table->string('titulo');
            $table->integer('codigo_verificacion', false, true);
            $table->string('num_publicidad')->nullable();
            $table->string('num_titulo');
            $table->date('fecha_titulo');
            $table->string('zona_registral', 5);
            $table->string('sede_registral', 25);
            $table->string('placa');
            $table->string('partida_registral', 20);
            $table->string('DUA_DAM', 30);
            $table->string('categoria', 20)->nullable();
            $table->string('marca', 30);
            $table->string('modelo', 30);
            $table->string('color1', 30);
            $table->string('color2', 30)->nullable();
            $table->string('color3', 30)->nullable();
            $table->string('VIM', 30)->nullable();
            $table->string('serie_chasis', 30);
            $table->string('num_motor', 40);
            $table->string('carroceria', 50);
            $table->string('potencia_motor', 30)->nullable();
            $table->string('form_rodante', 30)->nullable();
            $table->string('combustible', 30);
            $table->string('version', 30)->nullable();
            $table->year('anio_fabricacion');
            $table->year('anio_modelo')->nullable();
            $table->string('asientos', 2);
            $table->string('pasajeros', 2);
            $table->string('ruedas', 2);
            $table->string('ejes', 2);
            $table->string('cilindros', 2);
            $table->decimal('longitud');
            $table->decimal('altura');
            $table->decimal('ancho');
            $table->decimal('cilindrada')->nullable();
            $table->decimal('peso_bruto');
            $table->decimal('peso_neto');
            $table->decimal('carga_util');
            $table->string('condicion');
            $table->string('firma');
            $table->string('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sunarp_cabeceras');
        Schema::dropIfExists('sunarp_tarjetas');
    }
}
