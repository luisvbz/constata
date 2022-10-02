<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SunarpCabecera;

class SunarpNuevo extends Component
{
    public $form = [
        'pais' => '',
        'entidad' => '',
        'titulo' => '',
        'codigo_verificacion' => '',
        'num_publicidad' => '',
        'num_titulo' => '',
        'fecha_titulo' => '',
        'zona_registral' => '',
        'sede_registral' => '',
        'placa' => '',
        'partida_registral' => '',
        'DUA_DAM' => '',
        'categoria' => '',
        'marca' => '',
        'modelo' => '',
        'color' => '',
        'VIM' => '',
        'serie_chasis' => '',
        'num_motor' => '',
        'carroceria' => '',
        'potencia_motor' => '',
        'form_rodante' => '',
        'combustible' => '',
        'version' => '',
        'anio_fabricacion' => '',
        'anio_modelo' => '',
        'asientos' => '',
        'pasajeros' => '',
        'ruedas' => '',
        'ejes' => '',
        'cilindros' => '',
        'longitud' => '',
        'altura' => '',
        'ancho' => '',
        'cilindrada' => '',
        'peso_bruto' => '',
        'peso_neto' => '',
        'carga_util' => '',
        'firma' => '',
        'fecha' => '',
    ];

    public function mount()
    {
        $cabeceras = SunarpCabecera::first();
        $this->form['pais'] = $cabeceras->pais;
        $this->form['entidad'] = $cabeceras->entidad;
        $this->form['titulo'] = $cabeceras->titulo;
    }

    protected function rules()
    {
        return [
            'form.codigo_verificacion' => 'required|numeric',
            'form.num_publicidad' => 'nullable',
            'form.num_titulo' => 'required',
            'form.fecha_titulo' => 'required|date:Y-m-d',
            'form.zona_registral' => 'required',
            'form.sede_registral' => 'required',
            'form.placa' => 'required',
            'form.partida_registral' => 'required|numeric',
            'form.DUA_DAM' => 'required',
            'form.categoria' => 'required',
            'form.marca' => 'required',
            'form.modelo' => 'required',
            'form.color' => 'required',
            'form.VIM' => 'required',
            'form.serie_chasis' => 'required',
            'form.num_motor' => 'required',
            'form.carroceria' => 'required',
            'form.potencia_motor' => 'required',
            'form.form_rodante' => 'required',
            'form.combustible' => 'required',
            'form.version' => 'required',
            'form.anio_fabricacion' => 'required',
            'form.anio_modelo' => 'required',
            'form.asientos' => 'required|numeric',
            'form.pasajeros' => 'required|numeric',
            'form.ruedas' => 'required|numeric',
            'form.ejes' => 'required|numeric',
            'form.cilindros' => 'required|numeric',
            'form.longitud' => 'required|numeric',
            'form.altura' => 'required|numeric',
            'form.ancho' => 'required|numeric',
            'form.cilindrada' => 'required|numeric',
            'form.peso_bruto' => 'required|numeric',
            'form.peso_neto' => 'required|numeric',
            'form.carga_util' => 'required|numeric',
            'form.firma' => 'required|image|max:1024',
            'form.fecha' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'form.codigo_verificacion.required' => 'El código de verificación es requerido.',
            'form.codigo_verificacion.numeric' => 'El valor debe ser numérico.',
            'form.num_titulo.required' => 'El Nº del título es requerido.',
            'form.fecha_titulo.required' => 'La fecha del título es requerida.',
            'form.fecha_titulo.date' => 'El formato de la fecha es inválido.',
            'form.zona_registral.required' => 'La zona registral es requerida.',
            'form.sede_registral.required' => 'La sede registral es requerida.',
            'form.placa.required' => 'La placa es requerida.',
            'form.partida_registral.required' => 'La partida registral es requerida.',
            'form.partida_registral.numeric' => 'El valor debe ser numérico.',
            'form.DUA_DAM.required' => 'El DUA/DAM es requerido.',
            'form.categoria.required' => 'La categoria es requerida.',
            'form.marca.required' => 'La marca es requerida.',
            'form.modelo.required' => 'El modelo es requerido.',
            'form.color.required' => 'El color es requerido.',
            'form.VIM.required' => 'El VIM es requerido.',
            'form.serie_chasis.required' => 'El Nº de serie/chasis es requerido.',
            'form.num_motor.required' => 'El Nº del motor es requerido.',
            'form.carroceria.required' => 'La carroceria es requerida.',
            'form.potencia_motor.required' => 'La potencia del motor es requerida.',
            'form.form_rodante.required' => 'La forma rodante es requerida.',
            'form.combustible.required' => 'El combustible es requerido.',
            'form.version.required' => 'La versión es requerida.',
            'form.anio_fabricacion.required' => 'El año de fabricación es requerido.',
            'form.anio_modelo.required' => 'El año del modelo es requerido.',
            'form.asientos.required' => 'El Nº de asientos es requerido.',
            'form.asientos.numeric' => 'El valor debe ser numérico.',
            'form.pasajeros.required' => 'El Nº de pasajeros es requerido.',
            'form.pasajeros.numeric' => 'El valor debe ser numérico.',
            'form.ruedas.required' => 'El Nº de ruedas es requerida.',
            'form.ruedas.numeric' => 'El valor debe ser numérico.',
            'form.ejes.required' => 'El Nº de ejes es requerido.',
            'form.ejes.numeric' => 'El valor debe ser numérico.',
            'form.cilindros.required' => 'El Nº de cilindros es requerido.',
            'form.cilindros.numeric' => 'El valor debe ser numérico.',
            'form.longitud.required' => 'La longitud es requerida.',
            'form.longitud.numeric' => 'El valor debe ser numérico.',
            'form.altura.required' => 'La altura es requerida.',
            'form.altura.numeric' => 'El valor debe ser numérico.',
            'form.ancho.required' => 'El ancho es requerido.',
            'form.ancho.numeric' => 'El valor debe ser numérico.',
            'form.cilindrada.required' => 'La cilindrada es requerida.',
            'form.cilindrada.numeric' => 'El valor debe ser numérico.',
            'form.peso_bruto.required' => 'El peso debe ser numérico.',
            'form.peso_bruto.numeric' => 'El valor debe ser numérico.',
            'form.peso_neto.required' => 'El peso neto es requerido.',
            'form.peso_neto.numeric' => 'El valor debe ser numérico.',
            'form.carga_util.required' => 'La carga util es requerida.',
            'form.carga_util.numeric' => 'El valor debe ser numérico.',
            'form.firma.required' => 'La firma es requerida.',
            'form.firma.image' => 'El formato de la imagen no es válido.',
            'form.firma.max' => 'La imagen debe pesar hasta 1MB.',
            'form.fecha.required' => 'La fecha es requerida.',
        ];
    }

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.dashboard.sunarp-nuevo')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
