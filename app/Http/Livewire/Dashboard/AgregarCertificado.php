<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Certificado;
use Livewire\Component;

class AgregarCertificado extends Component
{
    public $form = [
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

        //generar el nuevo certificado vehicular

        try {

            Certificado::create([
                'placa' => $this->form['placa'],
                'codigo' => $this->form['codigo'],
                'vigente_desde' => $this->date_to_datedb($this->form['vigente_desde'], '/'),
                'vigente_hasta' => $this->date_to_datedb($this->form['vigente_hasta'], '/'),
                'resultado_inspeccion' => $this->form['resultado_inspeccion'],
                'empresa' => strtoupper($this->form['empresa']),
                'direccion' => strtoupper($this->form['direccion']),
                'ambito' => strtoupper($this->form['ambito']),
                'servicio' => strtoupper($this->form['servicio']),
            ]);

            session()->flash('message', 'El registro se ha guardado con éxito');

            $this->redirect(route('dashboard'));

        }catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function date_to_datedb($date, $delimiter = "-") {
        list($d, $m, $y) = explode($delimiter, $date);
        if(strlen($y) != 4) {
            throw new \Exception("Formato de fecha inválido.");
        }
        return "$y-$m-$d";
    }

    public function render()
    {
        return view('livewire.dashboard.agregar-certificado')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
