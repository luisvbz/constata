<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class AgregarCertificado extends Component
{
    public $form = [
        'estado' => 1,
        'placa' => '',
        'codigo' => '',
        'vigente_desde' => '',
        'vigente_hasta' => '',
        'resultado_inspeccion' => '',
        'empresa' => '',
        'direccion' => '',
        'ambito' => '',
        'servicio' => '',
    ];

    public function updated ($field) {
        $this->validateOnly($field, [
            'form.estado' => 'required',
            'form.placa' => 'required|unique:certificados,placa',
            'form.codigo' => 'required|unique:certificados,codigo',
            'form.vigente_desde' => 'required|date_format:d/m/Y',
            'form.vigente_hasta' => 'required|date_format:d/m/Y',
            'form.resultado_inspeccion' => 'required',
            'form.empresa' => 'required',
            'form.direccion' => 'required',
            'form.ambito' => 'required',
            'form.servicio' => 'required',
        ], [
            'form.estado.required' => 'Debe seleccionar el estado',
            'form.placa.required' => 'Debe ingresar la placa',
            'form.placa.unique' => 'El numero de placa ya se encuentra registrado',
            'form.codigo.required' => 'Debe ingresar el codigo',
            'form.codigo.unique' => 'El codigo ya se encuentra registrado',
            'form.vigente_desde.required' => 'Debe ingresar la fecha',
            'form.vigente_desde.date_format' => 'El formato de la fecha es invalido',
            'form.vigente_hasta.required' => 'Debe ingresar la fecha',
            'form.vigente_hasta.date_format' => 'El formato de la fecha es invalido',
            'form.empresa.required' => 'Debe ingresar la empresa',
            'form.direccion.required' => 'Debe ingresar la dirección',
            'form.ambito.required' => 'Debe ingresar el ámbito',
            'form.servicio.required' => 'Debe ingresar el servicio',
            'form.resultado_inspeccion.required' => 'Debe ingresar el resultado de inspección',
        ]);
    }

    public function guardar()
    {
        $this->validate([
           'form.estado' => 'required',
           'form.placa' => 'required|unique:certificados,placa',
           'form.codigo' => 'required|unique:certificados,codigo',
           'form.vigente_desde' => 'required|date_format:d/m/Y',
           'form.vigente_hasta' => 'required|date_format:d/m/Y',
           'form.resultado_inspeccion' => 'required',
           'form.empresa' => 'required',
           'form.direccion' => 'required',
           'form.ambito' => 'required',
           'form.servicio' => 'required',
        ], [
            'form.estado.required' => 'Debe seleccionar el estado',
            'form.placa.required' => 'Debe ingresar la placa',
            'form.placa.unique' => 'El numero de placa ya se encuentra registrado',
            'form.codigo.required' => 'Debe ingresar el codigo',
            'form.codigo.unique' => 'El codigo ya se encuentra registrado',
            'form.vigente_desde.required' => 'Debe ingresar la fecha',
            'form.vigente_desde.date_format' => 'El formato de la fecha es invalido',
            'form.vigente_hasta.required' => 'Debe ingresar la fecha',
            'form.vigente_hasta.date_format' => 'El formato de la fecha es invalido',
            'form.empresa.required' => 'Debe ingresar la empresa',
            'form.direccion.required' => 'Debe ingresar la dirección',
            'form.ambito.required' => 'Debe ingresar el ámbito',
            'form.servicio.required' => 'Debe ingresar el servicio',
            'form.resultado_inspeccion.required' => 'Debe ingresar el resultado de inspección',
        ]);

        dd($this->form);
    }

    public function render()
    {
        return view('livewire.dashboard.agregar-certificado')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
