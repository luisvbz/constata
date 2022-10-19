<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SunarpFirma;
use App\Models\SunarpTarjeta;
use Livewire\WithFileUploads;
use App\Models\SunarpCabecera;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SunarpEditar extends Component
{
    use WithFileUploads;
    
    public $tarjeta;
    public $saveFirma = false;
    public $firmas_guardadas = [];
    public $form = [
        'id' => '',
        'pais' => '',
        'entidad' => '',
        'titulo' => '',
        'codigo_verificacion' => '',
        'num_publicidad' => '',
        'num_titulo' => '',
        'anio_titulo' => '',
        'zona_registral' => '',
        'sede_registral' => '',
        'placa' => '',
        'placa_anterior' => '',
        'partida_registral' => '',
        'DUA_DAM' => '',
        'categoria' => '',
        'marca' => '',
        'modelo' => '',
        'color1' => '',
        'color2' => '',
        'color3' => '',
        'VIM' => '',
        'serie_chasis' => '',
        'num_motor' => '',
        'carroceria' => '',
        'potencia_motor' => '',
        'form_rodante' => '',
        'combustible' => '',
        'version' => '',
        'anio_fabricacion' => '',
        'anio_modelo' => '',
        'asientos' => '',
        'pasajeros' => '',
        'ruedas' => '',
        'ejes' => '',
        'cilindros' => '',
        'longitud' => '',
        'altura' => '',
        'ancho' => '',
        'cilindrada' => '',
        'peso_bruto' => '',
        'peso_neto' => '',
        'carga_util' => '',
        'condicion' => 'SIN DEFINIR',
        'firma' => '',
        'firma_guardada' => '',
        'nombre_firma' => 'Sin nombre',
    ];

    public function mount($codigo)
    {
        $this->tarjeta = SunarpTarjeta::with('firmaGuardada')->where('codigo_verificacion', $codigo)->first();
        if (!$this->tarjeta) {
            abort(404);
        }
        $this->firmas_guardadas = SunarpFirma::get()->toArray();
        $this->form['id'] = $this->tarjeta->id;
        $this->form['codigo_verificacion'] = $this->tarjeta->codigo_verificacion;
        $this->form['pais'] = $this->tarjeta->pais;
        $this->form['entidad'] = $this->tarjeta->entidad;
        $this->form['titulo'] = $this->tarjeta->titulo;
        $this->form['partida_registral'] = $this->tarjeta->partida_registral;
        $this->form['num_titulo'] = $this->tarjeta->num_titulo;
        $this->form['anio_titulo'] = $this->tarjeta->anio_titulo;
        $this->form['zona_registral'] = $this->tarjeta->zona_registral;
        $this->form['sede_registral'] = ucfirst(strtolower($this->tarjeta->sede_registral));
        $this->form['placa'] = $this->tarjeta->placa;
        $this->form['placa_anterior'] = $this->tarjeta->placa_anterior;
        $this->form['DUA_DAM'] = $this->tarjeta->DUA_DAM;
        $this->form['categoria'] = $this->tarjeta->categoria;
        $this->form['marca'] = $this->tarjeta->marca;
        $this->form['modelo'] = $this->tarjeta->modelo;
        $this->form['color1'] = $this->tarjeta->color1;
        $this->form['color2'] = $this->tarjeta->color2;
        $this->form['color3'] = $this->tarjeta->color3;
        $this->form['VIM'] = $this->tarjeta->VIM;
        $this->form['serie_chasis'] = $this->tarjeta->serie_chasis;
        $this->form['num_motor'] = $this->tarjeta->num_motor;
        $this->form['carroceria'] = $this->tarjeta->carroceria;
        $this->form['potencia_motor'] = $this->tarjeta->potencia_motor;
        $this->form['form_rodante'] = $this->tarjeta->form_rodante;
        $this->form['combustible'] = $this->tarjeta->combustible;
        $this->form['version'] = $this->tarjeta->version;
        $this->form['anio_fabricacion'] = $this->tarjeta->anio_fabricacion;
        $this->form['anio_modelo'] = $this->tarjeta->anio_modelo;
        $this->form['asientos'] = $this->tarjeta->asientos;
        $this->form['pasajeros'] = $this->tarjeta->pasajeros;
        $this->form['ruedas'] = $this->tarjeta->ruedas;
        $this->form['ejes'] = $this->tarjeta->ejes;
        $this->form['cilindros'] = $this->tarjeta->cilindros;
        $this->form['longitud'] = $this->tarjeta->longitud;
        $this->form['altura'] = $this->tarjeta->altura;
        $this->form['ancho'] = $this->tarjeta->ancho;
        $this->form['cilindrada'] = $this->tarjeta->cilindrada;
        $this->form['peso_bruto'] = $this->tarjeta->peso_bruto;
        $this->form['peso_neto'] = $this->tarjeta->peso_neto;
        $this->form['carga_util'] = $this->tarjeta->carga_util;
        $this->form['condicion'] = $this->tarjeta->condicion;
        // $this->form['firma'] = '';
        $this->form['firma_source'] = $this->tarjeta->firma;
        $this->form['firma_guardada'] = $this->tarjeta->firmaGuardada ? $this->tarjeta->firmaGuardada->id : '';
    }

    protected function rules()
    {
        return [
            'form.codigo_verificacion' => [
                'required',
                'numeric',
                Rule::unique('sunarp_tarjetas', 'codigo_verificacion')->ignore($this->tarjeta),
            ],
            'form.num_publicidad' => 'nullable',
            'form.num_titulo' => 'required',
            'form.zona_registral' => 'required',
            'form.sede_registral' => 'required',
            'form.placa' => 'required',
            'form.partida_registral' => 'required|numeric',
            'form.categoria' => 'nullable',
            'form.marca' => 'required',
            'form.modelo' => 'required',
            'form.color1' => 'required',
            'form.color2' => 'nullable',
            'form.color3' => 'nullable',
            'form.VIM' => 'nullable',
            'form.serie_chasis' => 'required',
            'form.num_motor' => 'required',
            'form.carroceria' => 'required',
            'form.potencia_motor' => 'nullable',
            'form.form_rodante' => 'nullable',
            'form.combustible' => 'required',
            'form.version' => 'nullable',
            'form.anio_fabricacion' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (strlen($value) > 4) {
                        $fail('Máx. hasta 4 digitos.');
                    }
                },
            ],
            'form.anio_modelo' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (strlen($value) > 4) {
                        $fail('Máx. hasta 4 digitos.');
                    }
                },
            ],
            'form.asientos' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (strlen($value) > 2) {
                        $fail('Máx. hasta 2 digitos.');
                    }
                },
            ],
            'form.pasajeros' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (strlen($value) > 2) {
                        $fail('Máx. hasta 2 digitos.');
                    }
                },
            ],
            'form.ruedas' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (strlen($value) > 2) {
                        $fail('Máx. hasta 2 digitos.');
                    }
                },
            ],
            'form.ejes' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (strlen($value) > 2) {
                        $fail('Máx. hasta 2 digitos.');
                    }
                },
            ],
            'form.cilindros' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (strlen($value) > 2) {
                        $fail('Máx. hasta 2 digitos.');
                    }
                },
            ],
            'form.longitud' => 'required|numeric',
            'form.altura' => 'required|numeric',
            'form.ancho' => 'required|numeric',
            'form.cilindrada' => 'nullable|numeric',
            'form.peso_bruto' => 'required|numeric',
            'form.peso_neto' => 'required|numeric',
            'form.carga_util' => 'required|numeric',
            'form.condicion' => 'required',
            'form.firma' => ['image', 'max:1024'],
        ];
    }

    protected function messages()
    {
        return [
            'form.codigo_verificacion.required' => 'El código de verificación es requerido.',
            'form.codigo_verificacion.numeric' => 'El valor debe ser numérico.',
            'form.codigo_verificacion.unique' => 'Ya existe un registro con el mismo código de verificación.',
            'form.num_titulo.required' => 'El Nº del título es requerido.',
            'form.zona_registral.required' => 'La zona registral es requerida.',
            'form.sede_registral.required' => 'La sede registral es requerida.',
            'form.placa.required' => 'La placa es requerida.',
            'form.partida_registral.required' => 'La partida registral es requerida.',
            'form.partida_registral.numeric' => 'El valor debe ser numérico.',
            'form.marca.required' => 'La marca es requerida.',
            'form.modelo.required' => 'El modelo es requerido.',
            'form.color1.required' => 'El color 1 es requerido.',
            'form.serie_chasis.required' => 'El Nº de serie/chasis es requerido.',
            'form.num_motor.required' => 'El Nº del motor es requerido.',
            'form.carroceria.required' => 'La carroceria es requerida.',
            'form.combustible.required' => 'El combustible es requerido.',
            'form.anio_fabricacion.required' => 'El año de fabricación es requerido.',
            'form.asientos.required' => 'El Nº de asientos es requerido.',
            'form.asientos.numeric' => 'El valor debe ser numérico.',
            'form.pasajeros.required' => 'El Nº de pasajeros es requerido.',
            'form.pasajeros.numeric' => 'El valor debe ser numérico.',
            'form.ruedas.required' => 'El Nº de ruedas es requerida.',
            'form.ruedas.numeric' => 'El valor debe ser numérico.',
            'form.ejes.required' => 'El Nº de ejes es requerido.',
            'form.ejes.numeric' => 'El valor debe ser numérico.',
            'form.cilindros.required' => 'El Nº de cilindros es requerido.',
            'form.cilindros.numeric' => 'El valor debe ser numérico.',
            'form.longitud.required' => 'La longitud es requerida.',
            'form.longitud.numeric' => 'El valor debe ser numérico.',
            'form.altura.required' => 'La altura es requerida.',
            'form.altura.numeric' => 'El valor debe ser numérico.',
            'form.ancho.required' => 'El ancho es requerido.',
            'form.ancho.numeric' => 'El valor debe ser numérico.',
            'form.cilindrada.numeric' => 'El valor debe ser numérico.',
            'form.peso_bruto.required' => 'El peso debe ser numérico.',
            'form.peso_bruto.numeric' => 'El valor debe ser numérico.',
            'form.peso_neto.required' => 'El peso neto es requerido.',
            'form.peso_neto.numeric' => 'El valor debe ser numérico.',
            'form.carga_util.required' => 'La carga util es requerida.',
            'form.carga_util.numeric' => 'El valor debe ser numérico.',
            'form.condicion.required' => 'La condición es requerida.',
            'form.firma.image' => 'El formato de la imagen no es válido.',
            'form.firma.max' => 'La imagen debe pesar hasta 1MB.',
        ];
    }

    public function delFirma()
    {
        if (!is_null($this->tarjeta->firma_id)) {
            $this->tarjeta->firma = null;
            $this->tarjeta->firma_id = null;
            $this->tarjeta->firma_file = null;
            $this->tarjeta->save();
        } else {
            Storage::delete($this->tarjeta->firma_file);
            $this->tarjeta->firma = null;
            $this->tarjeta->firma_id = null;
            $this->tarjeta->firma_file = null;
            $this->tarjeta->save();
        }
        $this->form['firma'] = '';
        $this->form['firma_source'] = '';
        $this->form['firma_guardada'] = '';
    }

    public function save()
    {
        // dd($this->form);
        $this->validate();
        
        DB::beginTransaction();

        $firma = null;

        if (!$this->form['firma_guardada']) {
            // Save signature
            if ($this->form['firma']) {
                $path = $this->form['firma']->store('public');
                // path publico
                $pathReal = explode("public/", $path)[1];
                $url = url("/storage/" . $pathReal);
            }
        } else {
            $firmaGuard = SunarpFirma::find($this->form['firma_guardada']);
            $firma = $firmaGuard;
            $url = $firmaGuard->firma;
            $path = $firmaGuard->firma_file;
        }

        if ((bool)$this->saveFirma && !$this->form['firma_guardada']) {
            $firmas = SunarpFirma::get();
            foreach ($firmas as $f) {
                $f->predeterminada = 0;
                $f->save();
            }
            $firma = SunarpFirma::create([
                'nombre_firma' => trim($this->form['nombre_firma']) ?: 'Sin nombre',
                'firma' => $url,
                'firma_file' => $path,
                'predeterminada' => 1,
            ]);
        }

        $now = now();

        SunarpTarjeta::where('id', $this->tarjeta->id)->update([
            'pais' => $this->form['pais'],
            'entidad' => $this->form['entidad'],
            'titulo' => $this->form['titulo'],
            'codigo_verificacion' => $this->form['codigo_verificacion'],
            'num_publicidad' => $this->form['num_publicidad'] ?: null,
            'num_titulo' => $this->form['num_titulo'],
            'anio_titulo' => $this->form['anio_titulo'],
            'zona_registral' => $this->form['zona_registral'],
            'sede_registral' => strtoupper($this->form['sede_registral']),
            'placa' => $this->form['placa'],
            'placa_anterior' => $this->form['placa_anterior'] ?: null,
            'partida_registral' => $this->form['partida_registral'],
            'DUA_DAM' => $this->form['DUA_DAM'] ?: '000-0000-00-000000-0',
            'categoria' => $this->form['categoria'] ?: null,
            'marca' => $this->form['marca'],
            'modelo' => $this->form['modelo'],
            'color1' => $this->form['color1'],
            'color2' => $this->form['color2'] ?: null,
            'color3' => $this->form['color3'] ?: null,
            'VIM' => $this->form['VIM'],
            'serie_chasis' => $this->form['serie_chasis'],
            'num_motor' => $this->form['num_motor'],
            'carroceria' => $this->form['carroceria'],
            'potencia_motor' => $this->form['potencia_motor'] ?: null,
            'form_rodante' => $this->form['form_rodante'] ?: null,
            'combustible' => $this->form['combustible'],
            'version' => $this->form['version'] ?: null,
            'anio_fabricacion' => $this->form['anio_fabricacion'],
            'anio_modelo' => $this->form['anio_modelo'] ?: null,
            'asientos' => $this->form['asientos'],
            'pasajeros' => $this->form['pasajeros'],
            'ruedas' => $this->form['ruedas'],
            'ejes' => $this->form['ejes'],
            'cilindros' => $this->form['cilindros'],
            'longitud' => $this->form['longitud'],
            'altura' => $this->form['altura'],
            'ancho' => $this->form['ancho'],
            'cilindrada' => $this->form['cilindrada'] ?: null,
            'peso_bruto' => $this->form['peso_bruto'],
            'peso_neto' => $this->form['peso_neto'],
            'carga_util' => $this->form['carga_util'],
            'condicion' => $this->form['condicion'],
            'fecha' => $now
        ]);

        $this->tarjeta->firma_id = $firma ? $firma->id : null;
        if (isset($url)) {
            $this->tarjeta->firma = $url;
            $this->tarjeta->save();
        }
        if (isset($path)) {
            $this->tarjeta->firma_file = $path;
            $this->tarjeta->save();
        }

        DB::commit();

        session()->flash('message', 'La información de la tarjeta se ha guardado correctamente.');
        return redirect()->route('sunarp');
    }

    public function render()
    {
        return view('livewire.dashboard.sunarp-editar')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
