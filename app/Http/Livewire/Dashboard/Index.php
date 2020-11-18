<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Certificado;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
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

    public function eliminarRegistro()
    {
        try{
            $cert = Certificado::find($this->item_id);
            $cert->delete();

            $this->item_id = '';
            $this->dispatchBrowserEvent('item-deleted');
            session()->flash('message', 'El registro se ha eliminado con éxito!');

        }catch (\Exception $e)
        {
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {

        $certificados = Certificado::when($this->placa != '', function ($q) {
                                $q->where('placa', 'like', "%{$this->placa}%");
                            })->when($this->codigo != '', function ($q) {
                                $q->where('codigo', 'like', "%{$this->codigo}%");
                            })->orderBy('id', 'DESC')
                            ->paginate(30);

        return view('livewire.dashboard.index', ['certificados' => $certificados, 'total' => Certificado::count()])
                ->extends('layouts.dashboard')
                ->section('content');
    }
}
