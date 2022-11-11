<?php

use App\Http\Controllers\ReportesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\Frontend\Index::class)->name('principal');
Route::get('/login', \App\Http\Livewire\LoginForm::class)->name('login');
Route::get('/panel-administrador', \App\Http\Livewire\Dashboard\Index::class)->middleware('auth')->name('dashboard');
Route::get('/panel-administrador/perfil', \App\Http\Livewire\Dashboard\Perfil::class)->middleware('auth')->name('perfil');
Route::get('/panel-administrador/carga-masiva', \App\Http\Livewire\Dashboard\CargaMasiva::class)->middleware('auth')->name('carga.masiva');
Route::get('/panel-administrador/agregar-certificado', \App\Http\Livewire\Dashboard\AgregarCertificado::class)->middleware('auth')->name('nuevo.certificado');
Route::get('/panel-administrador/editar-certificado/{placa}', \App\Http\Livewire\Dashboard\EditarCertificado::class)->middleware('auth')->name('editar.certificado');
Route::get('/panel-administrador/sunarp', \App\Http\Livewire\Dashboard\Sunarp::class)->middleware('auth')->name('sunarp');
Route::get('/panel-administrador/sunarp/nuevo', \App\Http\Livewire\Dashboard\SunarpNuevo::class)->middleware('auth')->name('sunarp.nuevo');
Route::get('/panel-administrador/sunarp/editar/{codigo}', \App\Http\Livewire\Dashboard\SunarpEditar::class)->middleware('auth')->name('sunarp.editar');
Route::get('/panel-administrador/sunarp/configuracion', \App\Http\Livewire\Dashboard\SunarpConfig::class)->middleware('auth')->name('sunarp.config');
// DNIs
Route::get('/panel-administrador/dnis', \App\Http\Livewire\Dashboard\Dnis::class)->middleware('auth')->name('dnis');
Route::get('/panel-administrador/dnis/nuevo', \App\Http\Livewire\Dashboard\DnisNuevo::class)->middleware('auth')->name('dnis.nuevo');
Route::get('/panel-administrador/dnis/editar/{num}', \App\Http\Livewire\Dashboard\DnisEditar::class)->middleware('auth')->name('dnis.editar');

Route::get('/panel-administrador/descargar-formato',[ReportesController::class, 'descargarFormato'])->name('descargar.formato');
Route::get('/Sunarp/verTarjetavirtual/{codigo}', \App\Http\Livewire\SunarpVerTarjeta::class)->name('sunar.ver.tarjeta');

Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});
