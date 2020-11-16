<?php

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
Route::get('/panel-administrador/agregar-certificado', \App\Http\Livewire\Dashboard\AgregarCertificado::class)->middleware('auth')->name('nuevo.certificado');
