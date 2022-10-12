<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SunarpCabecera;

class SunarpConfig extends Component
{
    public $form = [
        'pais' => '',
        'entidad' => '',
        'titulo' => '',
        'codigo_verificacion' => '',
        'partida_registral' => '',
        'num_titulo' => '',
    ];
    public function mount()
    {
        $config = SunarpCabecera::first();
        $this->form['pais'] = $config->pais;
        $this->form['entidad'] = $config->entidad;
        $this->form['titulo'] = $config->titulo;
        $this->form['codigo_verificacion'] = $config->codigo_verificacion;
        $this->form['partida_registral'] = $config->partida_registral;
        $this->form['num_titulo'] = $config->num_titulo;
    }

    public function save()
    {
        $config = SunarpCabecera::first();
        $config->pais = $this->form['pais'];
        $config->entidad = $this->form['entidad'];
        $config->titulo = $this->form['titulo'];
        $config->codigo_verificacion = $this->form['codigo_verificacion'];
        $config->partida_registral = $this->form['partida_registral'];
        $config->num_titulo = $this->form['num_titulo'];
        $config->save();

        session()->flash('message', 'La configuración se guardado correctamente.');
        return redirect()->route('sunarp');
    }

    public function render()
    {
        return view('livewire.dashboard.sunarp-config')
        ->extends('layouts.dashboard')
        ->section('content');
    }
}