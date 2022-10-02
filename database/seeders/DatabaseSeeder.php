<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('sunarp_cabeceras')->insert([
            'pais' => 'REPÚBLICA DEL PERÚ',
            'entidad' => 'SUPERINTENDENCIA NACIONAL DE LOS REGISTROS PÚBLICOS',
            'titulo' => 'TARJETA DE IDENTIFICACIÓN VEHICULAR ELECTRÓNICA',
            'firma' => null
        ]);
    }
}
