<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class AgregarCertificado extends Component
{
    public function render()
    {
        return view('livewire.dashboard.agregar-certificado')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
