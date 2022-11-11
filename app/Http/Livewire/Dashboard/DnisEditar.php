<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class DnisEditar extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dnis-editar')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
