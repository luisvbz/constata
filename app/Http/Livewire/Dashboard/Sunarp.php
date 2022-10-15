<?php

namespace App\Http\Livewire\Dashboard;

use PDF;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SunarpTarjeta;

class Sunarp extends Component
{
    use WithPagination;
    public $placa = '';
    public $codigo = '';
    public $page = 1;
    public $item_id;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'placa' => ['except' => ''],
        'codigo' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->fill(request()->only('placa','codigo', 'page'));
    }

    public function filtrar()
    {
        $this->resetPage();
    }

    public function limpiar()
    {
        $this->reset(['placa', 'codigo']);
        $this->resetPage();
    }

    public function getSunarpPdf($item)
    {
        $pdf = PDF::loadView('pdfs.sunarp', $item);
        $pdf->save(storage_path('/app/public/pdfs/'.$item['codigo_verificacion'].'.pdf'));
        return url('/storage/pdfs/'.$item['codigo_verificacion'].'.pdf');
    }

    public function eliminarRegistro() {
        $t = SunarpTarjeta::find($this->item_id);
        if ($t) {
            $t->delete();
            session()->flash('message', 'El registro se ha eliminado correctamente.');
        }
    }
    
    public function render()
    {
        $sunarpTarjetas = SunarpTarjeta::when($this->placa != '', function ($q) {
            $q->where('placa', 'like', "%{$this->placa}%");
        })->when($this->codigo != '', function ($q) {
            $q->where('codigo', 'like', "%{$this->codigo}%");
        })->orderBy('id', 'DESC')
        ->paginate();
        
        return view('livewire.dashboard.sunarp', ['certificados' => $sunarpTarjetas, 'total' => SunarpTarjeta::count()])
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
