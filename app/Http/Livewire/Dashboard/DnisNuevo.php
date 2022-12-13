<?php

namespace App\Http\Livewire\Dashboard;

use PDF;
use App\Models\Dni;
use Livewire\Component;
use Livewire\WithFileUploads;

class DnisNuevo extends Component
{
    use WithFileUploads;

    public $saveFirma;
    public $firmas_guardadas = [];
    public $form = [
        'numero_documento' => '',
        'numero_verificacion' => '',
        'primer_apellido' => '',
        'segundo_apellido' => '',
        'pre_nombres' => '',
        'fecha_nacimiento' => '',
        'ubigeo' => '',
        'sexo' => '',
        'estado_civil' => '',
        'fecha_incripcion' => '',
        'fecha_emision' => '',
        'fecha_caducidad' => '',
        'departamento' => '',
        'provincia' => '',
        'distrito' => '',
        'direccion' => '',
        'donante' => '',
        'grupo_votacion' => '',
        'foto' => '',
        'huella' => '',
        'firma' => '',
    ];

    protected function rules()
    {
        return [
            'form.numero_documento' => 'required|max:191',
            'form.numero_verificacion' => 'required|max:191',
            'form.primer_apellido' => 'required|max:191',
            'form.segundo_apellido' => 'required|max:191',
            'form.pre_nombres' => 'required|max:191',
            'form.fecha_nacimiento' => 'required|date:Y-m-d',
            'form.ubigeo' => 'required|max:191',
            'form.sexo' => 'required|max:191',
            'form.estado_civil' => 'required|max:191',
            'form.fecha_incripcion' => 'required|date:Y-m-d',
            'form.fecha_emision' => 'required|date:Y-m-d',
            'form.fecha_caducidad' => 'required|date:Y-m-d',
            'form.departamento' => 'required|max:191',
            'form.provincia' => 'required|max:191',
            'form.distrito' => 'required|max:191',
            'form.direccion' => 'required|max:191',
            'form.donante' => 'required|max:191',
            'form.grupo_votacion' => 'required|max:191',
            'form.foto' => 'required|max:1024',
            'form.huella' => 'nullable|max:1024',
            'form.firma' => 'required|max:1024',
        ];
    }

    protected function messages()
    {
        return [
            'form.numero_documento.required' => 'El campo es requerido.',
            'form.numero_documento.max' => 'El campo debe ser hasta :max caracteres.',
            'form.numero_verificacion.required' => 'El campo es requerido.',
            'form.numero_verificacion.max' => 'El campo debe ser hasta :max caracteres.',
            'form.primer_apellido.required' => 'El campo es requerido.',
            'form.primer_apellido.max' => 'El campo debe ser hasta :max caracteres.',
            'form.segundo_apellido.required' => 'El campo es requerido.',
            'form.segundo_apellido.max' => 'El campo debe ser hasta :max caracteres.',
            'form.pre_nombres.required' => 'El campo es requerido.',
            'form.pre_nombres.max' => 'El campo debe ser hasta :max caracteres.',
            'form.fecha_nacimiento.required' => 'El campo es requerido.',
            'form.fecha_nacimiento.date' => 'La fecha es inválida.',
            'form.ubigeo.required' => 'El campo es requerido.',
            'form.ubigeo.max' => 'El campo debe ser hasta :max caracteres.',
            'form.sexo.required' => 'El campo es requerido.',
            'form.sexo.max' => 'El campo debe ser hasta :max caracteres.',
            'form.estado_civil.required' => 'El campo es requerido.',
            'form.estado_civil.max' => 'El campo debe ser hasta :max caracteres.',
            'form.fecha_incripcion.required' => 'El campo es requerido.',
            'form.fecha_incripcion.date' => 'La fecha es inválida.',
            'form.fecha_emision.required' => 'El campo es requerido.',
            'form.fecha_emision.date' => 'La fecha es inválida.',
            'form.fecha_caducidad.required' => 'El campo es requerido.',
            'form.fecha_caducidad.date' => 'La fecha es inválida.',
            'form.departamento.required' => 'El campo es requerido.',
            'form.departamento.max' => 'El campo debe ser hasta :max caracteres.',
            'form.provincia.required' => 'El campo es requerido.',
            'form.provincia.max' => 'El campo debe ser hasta :max caracteres.',
            'form.distrito.required' => 'El campo es requerido.',
            'form.distrito.max' => 'El campo debe ser hasta :max caracteres.',
            'form.direccion.required' => 'El campo es requerido.',
            'form.direccion.max' => 'El campo debe ser hasta :max caracteres.',
            'form.donante.required' => 'El campo es requerido.',
            'form.donante.max' => 'El campo debe ser hasta :max caracteres.',
            'form.grupo_votacion.required' => 'El campo es requerido.',
            'form.grupo_votacion.max' => 'El campo debe ser hasta :max caracteres.',
            'form.foto.required' => 'La foto es requerida.',
            'form.foto.max' => 'El peso max. permitido es de 1MB.',
            // 'form.huella' => 'required|max:1024',
            'form.firma.required' => 'La firma es requerida.',
            'form.firma.max' => 'El peso max. permitido es de 1MB.',
        ];
    }

    public function save()
    {
        $this->validate();

        // Save foto
        $urlFoto = null;
        if ($this->form['foto']) {
            $pathFoto = $this->form['foto']->store('public');
            // path publico
            $pathReal = explode("public/", $pathFoto)[1];
            $urlFoto = url("/storage/" . $pathReal);
        }
        $urlHuella = null;
        if ($this->form['huella']) {
            $pathHuella = $this->form['huella']->store('public');
            // path publico
            $pathReal = explode("public/", $pathHuella)[1];
            $urlHuella = url("/storage/" . $pathReal);
        }
        $urlFirma = null;
        if ($this->form['firma']) {
            $pathFirma = $this->form['firma']->store('public');
            // path publico
            $pathReal = explode("public/", $pathFirma)[1];
            $urlFirma = url("/storage/" . $pathReal);
        }

        Dni::create([
            'numero_documento' => $this->form['numero_documento'],
            'numero_verificacion' => $this->form['numero_verificacion'],
            'primer_apellido' => $this->form['primer_apellido'],
            'segundo_apellido' => $this->form['segundo_apellido'],
            'pre_nombres' => $this->form['pre_nombres'],
            'fecha_nacimiento' => $this->form['fecha_nacimiento'],
            'ubigeo' => $this->form['ubigeo'],
            'sexo' => $this->form['sexo'],
            'estado_civil' => $this->form['estado_civil'],
            'fecha_incripcion' => $this->form['fecha_incripcion'],
            'fecha_emision' => $this->form['fecha_emision'],
            'fecha_caducidad' => $this->form['fecha_caducidad'],
            'departamento' => $this->form['departamento'],
            'provincia' => $this->form['provincia'],
            'distrito' => $this->form['distrito'],
            'direccion' => $this->form['direccion'],
            'donante' => $this->form['donante'],
            'grupo_votacion' => $this->form['grupo_votacion'],
            'foto' => $urlFoto,
            'huella' => $urlHuella,
            'firma' => $urlFirma,
            'fecha_creacion' => now(),
        ]);

        session()->flash('message', 'Los datos del DNI se han guardado correctamente.');
        return redirect()->route('dnis');
        
    }

    public function render()
    {
        return view('livewire.dashboard.dnis-nuevo')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
