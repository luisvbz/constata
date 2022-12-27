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
        $imgback = new Image(resource_path('images/diseño-dni-post.png'));
        $img2 = new Image($item['foto']);
        $img3 = new Image($item['foto']);
        $img4 = new Image($item['firma']);
        $img5 = new Image(resource_path('images/firma_reniec.png'));
        $img5->rotate(-90);
        $img5->resize(65, 210);
        $img2->resize(240, 306);
        $img3->resize(70, 90);
        $white = imagecolorallocate($img3->getResource(), 255, 255, 255);
        imagecolortransparent($img3->getResource(), $white);
        imagefilter($img3->getResource(), IMG_FILTER_GRAYSCALE);
        imagefilter($img3->getResource(), IMG_FILTER_PIXELATE, 1.5);
        $img3 = new Image($img3);
        $img4->resize(180, 80);
        $img1 = $img2->merge($img1, -25, -50);
        $img1->merge($img3, 860, 310);
        $img1->merge($img4, 550, 350);
        $imgback->merge($img5, 758, 380);
        $img1->save(resource_path('images/diseño-dni-front-merged.png') , IMAGETYPE_PNG);
        $imgback->save(resource_path('images/diseño-dni-post-merged.png') , IMAGETYPE_PNG);
        
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
