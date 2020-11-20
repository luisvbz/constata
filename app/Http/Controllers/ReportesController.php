<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function descargarFormato()
    {

        try
        {

            $document = new Spreadsheet();
            $start = 1;

            $document->getProperties()
                ->setCreator("CONSTATA 1.0")
                ->setTitle('Formato carga certificados')
                ->setDescription('Este documento fue generado a traves de Constata.net')
                ->setCategory('Formatos');

            $sheet = $document->getActiveSheet();
            $cabecera = ['Placa', 'Codigo', 'Vigente Desde', 'Vigente Hasta', 'Empresa', 'Dirección', 'Ambito', 'Servicio', 'Resultado de Inspección'];
            $sheet->fromArray([$cabecera], NULL, "A{$start}");

            $writer = IOFactory::createWriter($document, 'Xlsx');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="file.xlsx"');
            return $writer->save('php://output');

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);

        }
    }
}
