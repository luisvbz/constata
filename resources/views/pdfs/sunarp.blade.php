<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sunarp</title>
    <style>
        @page {
            margin-top: 30pt;
            margin-left: 60pt;
            margin-right: 60pt;
            size: auto;
            background-image: url({{base_path("/resources/images/fd.jpeg")}}) no-repeat 0 0;
            background-image-resize: 6;
            background-size: contain;
        }
        body {
            font-family: 'arial';
        }
        .table {
            border-collapse: collapse;
            width: 100%;
            font-size: 9.5pt;
            color: #333;
        }
    </style>
</head>
<body>
    <table class="table" cellpadding="0" cellspacing="0">
        <tr>
            <td width="100%">
                <img src="{{ base_path('/resources/images/top-bar.png') }}" width="100%" alt="Sunarp">
            </td>
        </tr>
    </table>
    <table class="table" cellpadding="0" cellspacing="0">
        <tr>
            <td width="23%">
                <img src="data:image/png;base64,{!! base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->margin(3)->size(160)->generate($url)) !!}" width="135" alt="QrCode">
            </td>
            <td valign="middle" style="color:#222;line-height:1.5;">
               <div>&nbsp;</div> 
               <div>Código de Verificación: {{$codigo_verificacion}}</div> 
               <div>Título Nº: {{$num_titulo}}-{{ $anio_titulo }}</div> 
               <div>Fecha: {{$fecha}}</div>
            </td>
            <td width="30%">
                <img src="{{ base_path('/resources/images/sunarp_peru.png') }}" width="180px" alt="Sunarp">
            </td>
        </tr>
    </table>

    <div style="margin-top: 25px; margin-bottom: 25px; color: #222;">
        <div style="font-size: 12pt;font-weight: bold; line-height: 1.5;">{{ $pais }}</div>
        <div style="font-size: 8.5pt;font-weight: bold;">{{ $entidad }}</div>
        <div style="font-size: 12.5pt;font-weight: bold;">{{ $titulo }}</div>
        <div style="font-size: 11pt;color: #666;">ZONA REGISTRAL Nº {{ $zona_registral }}</div>
        <div style="font-size: 11pt;color: #666;">SEDE REGISTRAL - {{ $sede_registral }}</div>
    </div>

    @if ($placa_anterior)
    <table class="table" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
    @else
    <table class="table" cellpadding="0" cellspacing="0" style="margin-bottom: 60px;">
    @endif
        <tr>
            <td valign="top" style="line-height: 2; color: #000;">
               <div><strong>Partida Registral:</strong> {{ $partida_registral }}</div> 
               <div><strong>DUA/DAM:</strong> {{ $DUA_DAM }}</div> 
               <div><strong>Título:</strong>{{ $anio_titulo }}-{{ $num_titulo }}</div> 
               <div><strong>Fecha del Título:</strong> {{ $fecha | dateFormat }}</div> 
            </td>
            <td width="40%" align="center" valign="top">
                <table class="table" style="color: #000;">
                    <tr>
                        <td style="height:30px;">
                            <div><strong>Placa Nº</strong></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="line-height: 2; text-align: center; font-size: 14pt; background-color: #fff;">
                            <h1>{{ format_placa($placa) }}</h1>
                        </td>
                    </tr>
                    @if ($placa_anterior)
                    <tr>
                        <td style="height:25px;">
                            <div><strong>Placa Anterior Nº</strong></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="line-height: 2; text-align: center; font-size: 10pt;">
                            <div>{{ format_placa($placa_anterior) }}</div>
                        </td>
                    </tr>
                    @endif
                </table>
            </td>
        </tr>
    </table>

    <table class="table" style="margin-bottom: 15px;">
        <tr>
            <td align="center" width="35%" style="height: 50px;background-color: #fff;">
                @php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                @endphp
                <img src="data:image/png;base64,{!! base64_encode($generator->getBarcode($placa, $generator::TYPE_CODE_128, 2, 30)) !!}" width="200" alt="QrCode">
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>

    <table class="table" cellpadding="0" cellspacing="0">
        <tr>
            <td width="40%" style="color:#222;padding-left: 2px;padding-bottom:4px;">
                <div style="font-size: 13pt;font-weight: bold; line-height: 1.5;">Datos del Vehículo</div>
            </td>
            <td align="right" style="color:#bbb;">{{ create_code(10) }}</td>
        </tr>
        <tr>
            <td width="40%">
                <img src="{{ base_path('/resources/images/top-bar2.png') }}" width="185" alt="Sunarp">
            </td>
            <td></td>
        </tr>
    </table>

    <table class="table" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="middle" style="line-height: 2; color: #000;">
               <div><strong>Categoría :</strong> {{ $categoria ?: '#######' }}</div> 
               <div><strong>Marca :</strong> {{ $marca ?: '#######' }}</div> 
               <div><strong>Modelo :</strong> {{ $modelo }}</div> 
               <div><strong>Color :</strong> {{ $color1 ?: '#######' }} {{ $color2 ?: '#######' }} {{ $color3 ?: '#######' }}</div> 
               <div><strong>Número de VIN :</strong> {{ $VIM }}</div> 
               <div><strong>Número de Serie :</strong> {{ $serie_chasis }}</div> 
               <div><strong>Número de Motor :</strong> {{ $num_motor }}</div> 
               <div><strong>Carrocería :</strong> {{ $carroceria }}</div> 
               <div><strong>Potencia :</strong> {{ $potencia_motor }}</div>
            </td>
            <td width="25%" valign="top" style="line-height: 2; color: #000;">
                <div><strong>Año Fabric. :</strong> {{ $anio_fabricacion }}</div>
                <div><strong>Año Modelo :</strong> {{ $anio_modelo ?: '#######' }}</div>
            </td>
        </tr>
    </table>
    <table class="table" cellpadding="0" cellspacing="0" style="margin-bottom:5px;">
        <tr>
            <td valign="middle" style="line-height: 2; color: #000;">
               <div><strong>Form. Rod. :</strong> {{ $form_rodante }}</div> 
               <div><strong>Combustible :</strong> {{ $combustible }}</div> 
            </td>
            <td width="50%" valign="top" style="line-height: 2; color: #000;">
                <div><strong>Version :</strong> {{ $version ?: '#######' }}</div>
            </td>
        </tr>
    </table>

    <table border="0" cellspacing="0" cellpadding="0" style="font-size:9.5pt;">
        <tr>
            <td width="200" style="padding-left: 5px;">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Asientos :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $asientos }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Pasajeros :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $pasajeros }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Ruedas :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $ruedas }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Ejes :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $ejes }}
                        </td>
                    </tr>
                </table>
            </td>
            <td width="200" style="padding-left: 5px;">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Cilindros :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $cilindros }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Longitud :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $longitud }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Altura :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $altura }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Ancho :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $ancho }}
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Cilindrada :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $cilindrada }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>P. Bruto :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $peso_bruto }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>P. Neto :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $peso_neto }}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="line-height:1.6;">
                            <div><strong>Carga Util :</strong></div> 
                        </td>
                        <td align="left" style="padding-left:5px;">
                            {{ $carga_util }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="table" style="margin-top: 5px;">
        <tr>
            <td align="left" width="60%" style="height: 45px;background-color: #fff;">
                @php
                $pdf417 = new BigFish\PDF417\PDF417();
                $data = $pdf417->encode('!ZONA REGISTRAL Nº {{ $zona_registral }}!SEDE REGISTRAL - {{ $sede_registral }}!{{ $placa }}!{{ $partida_registral }}!{{ $DUA_DAM }}!{{ $num_titulo }}!{{ $fecha_titulo }}!{{ $marca }}!{{ $modelo }}!{{ $VIM }}!{{ $serie_chasis }}');

                $renderer = new BigFish\PDF417\Renderers\ImageRenderer([
                    'format' => 'data-url'
                ]);
                $img = $renderer->render($data);
                @endphp
                <img src="{{ $img->encoded }}" alt="QrCode" width="420" height="80">
            </td>
            <td align="center">
                @if ($firma)
                <img src="{{ $firma }}" alt="Firma" width="190">
                @endif
            </td>
        </tr>
    </table>
</body>
</html>