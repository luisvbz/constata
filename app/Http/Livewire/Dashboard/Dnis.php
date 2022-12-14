<?php

namespace App\Http\Livewire\Dashboard;

use PDF;
use App\Models\Dni;
use Livewire\Component;
use Livewire\WithPagination;
use Treinetic\ImageArtist\lib\Image;

class Dnis extends Component
{
    use WithPagination;
    
    public $numero_documento = '';
    public $item_id;

    public function filtrar()
    {
        $this->resetPage();
    }

    public function getDni($item)
    {
        $img1 = new Image(resource_path('images/diseño-dni-front.png'));
        $img2 = new Image($item['foto']);
        $img3 = new Image($item['firma']);
        $img2->resize(240, 306);
        $img3->resize(180, 80);
        $img1 = $img2->merge($img1, -25, -50);
        $img1->merge($img3, 550, 350);
        $img2->save(resource_path('images/diseño-dni-front-merged.png') , IMAGETYPE_PNG);
        
        $item['url'] = url('/storage/pdfs/'.$item['numero_documento'].'.pdf');
        $pdf = PDF::loadView('pdfs.dni', $item);
        $pdf->save(storage_path('/app/public/pdfs/'.$item['numero_documento'].'.pdf'));
        return url('/storage/pdfs/'.$item['numero_documento'].'.pdf');
    }

    public function eliminarRegistro()
    {
        $t = Dni::find($this->item_id);
        if ($t) {
            $t->delete();
            session()->flash('message', 'El registro se ha eliminado correctamente.');
        }
    }

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
