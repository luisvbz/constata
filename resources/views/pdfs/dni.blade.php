<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            size: auto;
        }
    </style>
</head>
<body>
    <img style="position:fixed;top:100;left:50;" src="{{ resource_path('images/diseño-dni-front-merged.png') }}" width="321.260px" alt="front">
    <div style="color:#912330;width:200px;position:fixed;top:6.5;left:248;font-size:7.5pt;font-weight:bold;">{{ $numero_documento }}</div>
    <div style="width:20px;position:fixed;top:6.5;left:302;font-size:7.5pt;font-weight:bold;">- {{ $numero_verificacion }}</div>
    <!-- Datos -->
    <div style="position:fixed;top:19;left:85;font-size:5.6pt;">Primer Apellido</div>
    <div style="position:fixed;top:27;left:85;font-weight:bold;font-size:5.6pt;">{{ $primer_apellido }}</div>
    <div style="position:fixed;top:40;left:85;font-size:5.6pt;">Segundo Apellido</div>
    <div style="position:fixed;top:48;left:85;font-weight:bold;font-size:5.6pt;">{{ $segundo_apellido }}</div>
    <div style="position:fixed;top:60;left:85;font-size:5.6pt;">Pre Nombres</div>
    <div style="position:fixed;top:68;left:85;font-weight:bold;font-size:5.6pt;">{{ $pre_nombres }}</div>
    <div style="position:fixed;top:80;left:85;font-size:5.6pt;">Nacimiento: Fecha y Ubigeo</div>
    <div style="position:fixed;top:89;left:85;font-weight:bold;font-size:5.6pt;">{{ date('d m Y', strtotime($fecha_nacimiento)) }}</div>
    <div style="position:fixed;top:89;left:140;font-weight:bold;font-size:5.6pt;text-align: center;">{{ $ubigeo }}</div>
    <div style="position:fixed;top:102;left:85;font-size:5.6pt;">Sexo</div>
    <div style="position:fixed;top:102;left:130;font-size:5.6pt;">Estado Civil</div>
    <div style="position:fixed;top:112;left:85;font-weight:bold;font-size:5.6pt;">{{ $sexo }}</div>
    <div style="position:fixed;top:112;left:130;font-weight:bold;font-size:5.6pt;text-align: center;">{{ $estado_civil }}</div>
    <div style="width:75px;position:fixed;top:115;left:10;color:#912330;text-align:center;font-size:5.6pt;letter-spacing:0.1;">{{ $primer_apellido }}</div>
    <div style="width:100px;position:fixed;rotate:90;top:21;left:3;color:#912330;letter-spacing:5;font-weight:bold;font-size:8.5pt;">{{ $numero_documento }}</div>

    <div style="width:150;position:fixed;top:21;left:248;">
        <table style="font-size:5pt;border-collapse:collapse;" cellspacing="0" cellpadding:0;>
            <tr>
                <td align="center" style="border:1px solid #0f0f0f;padding:3px 7px;">
                    <div>Fecha Inscripción</div>
                    <div style="font-weight:bold;">{{ date('d m Y', strtotime($fecha_incripcion)) }}</div>
                </td>
            </tr>
            <tr>
                <td align="center" style="border:1px solid #0f0f0f;padding:3px 7px;">
                    <div>Fecha Emisión</div>
                    <div style="font-weight:bold;">{{ date('d m Y', strtotime($fecha_emision)) }}</div>
                </td>
            </tr>
            <tr>
                <td align="center" style="border:1px solid #0f0f0f;padding:3px 7px;">
                    <div>Fecha Caducidad</div>
                    <div style="font-weight:bold;color:#912330;">{{ date('d m Y', strtotime($fecha_caducidad)) }}</div>
                </td>
            </tr>
        </table>
    </div>

    <div style="width:305px;position:fixed;top:126;left:10;font-size:10pt;font-family:monospace;font-weight:bold;letter-spacing:2.1;line-height:1.2;">
        @php
        $preNom = implode('<', explode(' ', $pre_nombres));
        @endphp
        <p>{{ 'I<PER'.$numero_documento.'<'. random_int(1, 9) .'<<<<<<<<<<<<<<<'. create_code(7) .'M'. create_code(7) .'PER<<<<<<<<<<<'. random_int(1, 9) .$primer_apellido.'<<'.$preNom.'<<<<<<<' }}</p>
    </div>

    <pagebreak type="NEXT-EVEN" />

    <img src="{{ resource_path('images/diseño-dni-post-merged.png') }}" width="321.260px" alt="front">
    <div style="width:230px;position:fixed;top:6;left:8;">
        <table style="width:100%;font-size:5.5pt;border-collapse:collapse;" cellspacing="0" cellpadding:0;>
            <tr>
                <td align="center" style="border:1px solid #00377E;padding:4px 6px;">
                    <div style="font-weight:bold;">CONSTANCIA DE SUFRAGIO</div>
                </td>
                <td align="center" style="border:1px solid #00377E;padding:4px 6px;">
                    <div style="font-weight:bold;">CONSTANCIA DE SUFRAGIO</div>
                </td>
                <td align="center" style="border:1px solid #00377E;padding:4px 6px;">
                    <div style="font-weight:bold;">CONSTANCIA DE SUFRAGIO</div>
                </td>
                <td align="center" style="border:1px solid #00377E;padding:4px 6px;">
                    <div style="font-weight:bold;">CONSTANCIA DE SUFRAGIO</div>
                </td>
            </tr>
            <tr>
                <td align="center" style="border:1px solid #00377E;padding:4px 6px;">
                    <div style="font-weight:bold;">CONSTANCIA DE SUFRAGIO</div>
                </td>
                <td align="center" style="border:1px solid #00377E;padding:4px 6px;">
                    <div style="font-weight:bold;">CONSTANCIA DE SUFRAGIO</div>
                </td>
                <td align="center" style="border:1px solid #00377E;padding:4px 6px;">
                    <div style="font-weight:bold;">CONSTANCIA DE SUFRAGIO</div>
                </td>
                <td align="center" style="border:1px solid #00377E;padding:4px 6px;">
                    <div style="font-weight:bold;">CONSTANCIA DE SUFRAGIO</div>
                </td>
            </tr>
        </table>
    </div>
    <div style="position:fixed;top:73;left:10;font-size:5.6pt;">Departamento</div>
    <div style="position:fixed;top:81;left:10;font-weight:bold;font-size:5.6pt;">{{ $departamento }}</div>
    <div style="position:fixed;top:73;left:90;font-size:5.6pt;">Provincia</div>
    <div style="position:fixed;top:81;left:90;font-weight:bold;font-size:5.6pt;">{{ $provincia }}</div>
    <div style="position:fixed;top:73;left:170;font-size:5.6pt;">Distrito</div>
    <div style="position:fixed;top:81;left:170;font-weight:bold;font-size:5.6pt;">{{ $distrito }}</div>
    <div style="position:fixed;top:95;left:10;font-size:5.6pt;">Dirección</div>
    <div style="position:fixed;top:103;left:10;font-weight:bold;font-size:5.6pt;">{{ $direccion }}</div>
    <div style="position:fixed;top:118;left:10;font-size:5.6pt;">Observaciones</div>
    <div style="position:fixed;top:125;left:10;font-size:5.6pt;">Donación de Organos</div>
    <div style="width:100px;position:fixed;top:125;left:90;font-weight:bold;font-size:5.6pt;">{{ $donante }}</div>
    <div style="position:fixed;top:125;left:126;font-size:5.6pt;">Grupo de Votación</div>
    <div style="width:100px;position:fixed;top:125;left:195;font-weight:bold;font-size:5.6pt;">{{ $grupo_votacion }}</div>
    <div style="width:100px;position:fixed;rotate:90;top:130;left:246;color:#0f0f0f;font-weight:bold;font-size:3.1pt;">CARMEN VELARDE KOECHLIN</div>
    <div style="width:100px;position:fixed;rotate:90;top:145;left:240;color:#0f0f0f;font-weight:bold;font-size:3.1pt;">JEFE NACIONAL</div>
 
</body>
</html>