<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Certificado;
use Livewire\Component;

class Index extends Component
{
    public $showResults = false;
    public $placa = '';
    public $certificados;

    public function updatedPlaca()
    {
        $this->validate(
            ['placa' => 'required'],
            ['placa.required' => 'Debe ingresar la placa']
        );
    }

    public function consultar()
    {
        $this->validate(
            ['placa' => 'required'],
            ['placa.required' => 'Debe ingresar la placa']
        );

        $this->certificados = Certificado::wherePlaca($this->placa)->orderBy('vigente_hasta', 'DESC')->take(2)->get();

        if(count($this->certificados) == 0) {
            session()->flash('error', "La placa {$this->placa} no se ha encontrado!");
            $this->placa = '';
            return;
        }

        $this->showResults = true;
    }

    public function clear ()
    {
        $this->placa = '';
        $this->showResults = false;
    }

    public function render()
    {
        return view('livewire.frontend.index')
            ->extends('layouts.frontend')
            ->section('content');
    }
}
