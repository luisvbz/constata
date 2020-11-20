<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Certificado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CargaMasiva extends Component
{
    use WithFileUploads;

    public $archivo;
    public $certificados = [];

    public function verificarArchivo ()
    {
        $this->validate([
            'archivo' => 'required|max:2048|mimes:xlsx', // 1MB Max
        ]);

        try {

            $this->archivo->storeAs('files', 'temporal.xlsx');

            $file = storage_path('app/files/temporal.xlsx');
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($file);
            $sheet = $spreadsheet->getActiveSheet();
            $start = 2;
            $highestRow = $sheet->getHighestRow();

            for ($row = 2; $row <= (int) $highestRow; ++$row) {

                $desde = $sheet->getCell("C{$row}")->getValue();
                $desdeDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($desde);
                $fechaDesde = new \DateTime();
                $fechaDesde->setTimestamp($desdeDate);

                $hasta = $sheet->getCell("D{$row}")->getValue();
                $hastaDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($hasta);
                $fechaHasta = new \DateTime();
                $fechaHasta->setTimestamp($hastaDate);

                if(!Certificado::whereCodigo(strtoupper($sheet->getCell("B{$row}")->getValue()))->exists()){
                    array_push($this->certificados, [
                        'placa' => strtoupper($sheet->getCell("A{$row}")->getValue()),
                        'codigo' => strtoupper($sheet->getCell("B{$row}")->getValue()),
                        'vigente_desde' => $fechaDesde->format('d/m/Y'),
                        'vigente_hasta' => $fechaHasta->format('d/m/Y'),
                        'empresa' => strtoupper($sheet->getCell("E{$row}")->getValue()),
                        'direccion' => strtoupper($sheet->getCell("F{$row}")->getValue()),
                        'ambito' => strtoupper($sheet->getCell("G{$row}")->getValue()),
                        'servicio' => strtoupper($sheet->getCell("H{$row}")->getValue()),
                        'resultado' => strtoupper($sheet->getCell("I{$row}")->getValue()),
                    ]);
                }

            }

            if(file_exists($file))
            {
                unlink($file);
            }

        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

    }

    public function procesarLista()
    {
        try {

            DB::beginTransaction();
                foreach ($this->certificados as $c)
                {
                    Certificado::create([
                        'placa' => $c['placa'],
                        'codigo' => $c['codigo'],
                        'vigente_desde' => $this->date_to_datedb($c['vigente_desde'], '/'),
                        'vigente_hasta' => $this->date_to_datedb($c['vigente_hasta'], '/'),
                        'resultado_inspeccion' => $c['resultado'],
                        'empresa' => strtoupper($c['empresa']),
                        'direccion' => strtoupper($c['direccion']),
                        'ambito' => strtoupper($c['ambito']),
                        'servicio' => strtoupper($c['servicio']),
                    ]);
                }

            session()->flash('message', 'La lista se ha procesado con éxito');
            $this->redirect(route('dashboard'));

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', $e->getMessage());
        }
    }

    public function date_to_datedb($date, $delimiter = "-") {
        list($d, $m, $y) = explode($delimiter, $date);
        if(strlen($y) != 4) {
            throw new \Exception("Formato de fecha inválido.");
        }
        return "$y-$m-$d";
    }

    public function render()
    {
        return view('livewire.dashboard.carga-masiva')
                    ->extends('layouts.dashboard')
                    ->section('content');
    }
}
