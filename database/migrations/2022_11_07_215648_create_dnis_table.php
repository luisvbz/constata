<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnis', function (Blueprint $table) {
            $table->id();
            $table->string('numero_documento');
            $table->string('numero_verificacion');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('pre_nombres');
            $table->date('fecha_nacimiento');
            $table->string('ubigeo');
            $table->string('sexo')->comment('M, F');
            $table->string('estado_civil')->comment('S, C, V');
            $table->date('fecha_incripcion');
            $table->date('fecha_emision');
            $table->date('fecha_caducidad');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('direccion');
            $table->string('donante')->comment('SI, NO')->default('NO');
            $table->string('grupo_votacion')->nullable();
            $table->string('foto')->nullable();
            $table->string('huella')->nullable();
            $table->string('firma')->nullable();
            $table->dateTime('fecha_creacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dnis');
    }
}
