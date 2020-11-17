<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 10);
            $table->string('codigo');
            $table->date('vigente_desde');
            $table->date('vigente_hasta');
            $table->text('resultado_inspeccion');
            $table->string('estado', 1)->comment('1: Vigente, 0: Vencido');
            $table->string('empresa');
            $table->string('direccion');
            $table->string('ambito');
            $table->string('servicio');
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
        Schema::dropIfExists('certificados');
    }
}
