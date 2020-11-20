<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Certificado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditarCertificado extends Component
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

    public $certificado;

    public function mount($placa)
    {
        $this->certificado = Certificado::wherePlaca($placa)->first();

        if(!$this->certificado)
        {
            abort(404);
        }

        $this->form['placa'] = $this->certificado->placa;
        $this->form['codigo'] = $this->certificado->codigo;
        $this->form['vigente_desde'] = $this->certificado->vigente_desde;
        $this->form['vigente_hasta'] = $this->certificado->vigente_hasta;
        $this->form['resultado_inspeccion'] = $this->certificado->resultado_inspeccion;
        $this->form['empresa'] = $this->certificado->empresa;
        $this->form['direccion'] = $this->certificado->direccion;
        $this->form['ambito'] = $this->certificado->ambito;
        $this->form['servicio'] = $this->certificado->servicio;
    }

    public function updated ($field) {

        $this->validateOnly($field, [
            'form.placa' => 'required',
            'form.codigo' => 'required',
            'form.vigente_desde' => 'required|date_format:d/m/Y',
            'form.vigente_hasta' => 'required|date_format:d/m/Y',
            'form.resultado_inspeccion' => 'required',
            'form.empresa' => 'required',
            'form.direccion' => 'required',
            'form.ambito' => 'required',
            'form.servicio' => 'required',
        ], [
            'form.placa.required' => 'Debe ingresar la placa',
            'form.codigo.required' => 'Debe ingresar el codigo',
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
            'form.placa' => 'required',
            'form.codigo' => 'required',
            'form.vigente_desde' => 'required|date_format:d/m/Y',
            'form.vigente_hasta' => 'required|date_format:d/m/Y',
            'form.resultado_inspeccion' => 'required',
            'form.empresa' => 'required',
            'form.direccion' => 'required',
            'form.ambito' => 'required',
            'form.servicio' => 'required',
        ], [
            'form.placa.required' => 'Debe ingresar la placa',
            'form.codigo.required' => 'Debe ingresar el codigo',
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

            if($this->certificado->codigo != $this->form['codigo'])
            {
                if(Certificado::whereCodigo($this->form['codigo'])->exists())    {
                    $this->addError('form.codigo', 'El código ya se encuentra registrada');
                    return;
                }
            }

            DB::beginTransaction();

            Certificado::where('placa', $this->certificado->placa)->update([
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

            DB::commit();

            session()->flash('message', 'El registro se ha editado con éxito');

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

    public function date_from_datedb($date, $delimiter = "-") {
        list($d, $m, $y) = explode($delimiter, $date);
        if(strlen($y) != 4) {
            throw new \Exception("Formato de fecha inválido.");
        }
        return "$d/$m/$y";
    }

    public function render()
    {
        return view('livewire.dashboard.editar-certificado')
                    ->extends('layouts.dashboard')
                    ->section('content');
    }
}
