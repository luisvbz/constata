<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\SunarpTarjeta;

class SunarpVerTarjeta extends Component
{
    public $codigo;
    public $openModal = true;
    public $titleModal = "PDF Viewer";
    public $url = "";

    protected $listeners = ["showModal"];

    public function mount($codigo)
    {
        $this->codigo = $codigo;
        $t = SunarpTarjeta::where('codigo_verificacion', $this->codigo)->first();
        if (!$t) {
            abort(404);
        }

        $item = SunarpTarjeta::where('codigo_verificacion', $this->codigo)->first();
        $item['url'] = url('/storage/pdfs/'.$item['codigo_verificacion'].'.pdf');
        $pdf = PDF::loadView('pdfs.sunarp', $item);
        $pdf->stream($item['codigo_verificacion'].'.pdf');
    }

    public function updatedOpenModal()
    {
        if (!$this->openModal) {
        $this->url = "";
        }
    }

    public function showModal($doc)
    {
        $this->openModal = true;
        $this->url = $doc["url"];
        $this->titleModal =(isset($doc["title"]) && !empty($doc["title"])) ? $doc["title"] : $this->titleModal;
    }

    public function render()
    {
        // $item = SunarpTarjeta::where('codigo_verificacion', $this->codigo)->first();
        // $item['url'] = url('/storage/pdfs/'.$item['codigo_verificacion'].'.pdf');
        // $pdf = PDF::loadView('pdfs.sunarp', $item);
        // $pdf->save(storage_path('app/public/pdfs/'.$item['codigo_verificacion'].'.pdf'));
        // $this->url = url('/storage/pdfs/'.$item['codigo_verificacion'].'.pdf');

        return view('livewire.sunarp-ver-tarjeta', [
            // 'url' => $this->url,
        ])
            ->extends('layouts.sunarp')
            ->section('content');
    }
}