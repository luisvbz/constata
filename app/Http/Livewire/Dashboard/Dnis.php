<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Dni;
use Livewire\Component;

class Dnis extends Component
{
    public $numero_documento = '';

    public function render()
    {
        $dnis = Dni::when($this->numero_documento != '', function ($q) {
            $q->where('numero_documento', 'like', "%{$this->numero_documento}%");
        })->orderBy('id', 'DESC')
        ->paginate();

        return view('livewire.dashboard.dnis', ['dnis' => $dnis, 'total' => Dni::count()])
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
