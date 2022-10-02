<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nueva Tarjeta Vehicular</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="save">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ingrese los datos de la nueva tarjeta vehicular</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Código de Verificación</strong></label>
                                <input wire:model.lazy="form.codigo_verificacion" class="form-control @error('form.codigo_verificacion') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Ingrese el cód. de verificación"/>
                                @error('form.codigo_verificacion')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de publicidad</strong></label>
                                <input wire:model.lazy="form.num_publicidad" class="form-control @error('form.num_publicidad') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Nº de publicidad"/>
                                @error('form.num_publicidad')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Título Nº</strong></label>
                                <input wire:model.lazy="form.num_titulo" class="form-control  @error('form.num_titulo') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Título Nº"/>
                                @error('form.num_titulo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Fecha del Título</strong></label>
                                <input id="fecha_titulo" wire:model.lazy="form.fecha_titulo" class="form-control  @error('form.fecha_titulo') is-invalid @enderror" placeholder="dd/mm/yyyy"/>
                                @error('form.fecha_titulo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="form-group">
                                <label><strong>Zona Registral:</strong></label>
                                <select wire:model.lazy="form.zona_registral" class="form-control @error('form.zona_registral') is-invalid @enderror">
                                    <option value="I">I</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                    <option value="XIII">XIII</option>
                                    <option value="XIV">XIV</option>
                                </select>
                                @error('form.zona_registral')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="form-group">
                                <label><strong>Sede Registral:</strong></label>
                                <select wire:model.lazy="form.sede_registral" class="form-control @error('form.sede_registral') is-invalid @enderror">
                                    <option value="Piura">Piura</option>
                                    <option value="Chiclayo">Chiclayo</option>
                                    <option value="Moyobamba">Moyobamba</option>
                                    <option value="Iquitos">Iquitos</option>
                                    <option value="Trujillo">Trujillo</option>
                                    <option value="Pucallpa">Pucallpa</option>
                                    <option value="Huaraz">Huaraz</option>
                                    <option value="Huancayo">Huancayo</option>
                                    <option value="Lima">Lima</option>
                                    <option value="Cusco">Cusco</option>
                                    <option value="Ica">Ica</option>
                                    <option value="Arequipa">Arequipa</option>
                                    <option value="Tacna">Tacna</option>
                                    <option value="Ayacucho">Ayacucho</option>
                                </select>
                                @error('form.sede_registral')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Placa</strong></label>
                                <input wire:model.lazy="form.placa" class="form-control @error('form.placa') is-invalid @enderror" placeholder="Ingrese el ámbito"/>
                                @error('form.placa')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Partida Registral</strong></label>
                                <input wire:model.lazy="form.partida_registral" class="form-control  @error('form.partida_registral') is-invalid @enderror" placeholder="Ingrese la partida_registral certificadora"/>
                                @error('form.partida_registral')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>DUA/DAM</strong></label>
                                <input  wire:model.lazy="form.DUA_DAM" class="form-control @error('form.DUA_DAM') is-invalid @enderror" placeholder="Ingrese el DUA_DAM"/>
                                @error('form.DUA_DAM')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Categoría:</strong></label>
                                <textarea  wire:model.lazy="form.categoria" class="form-control @error('form.categoria') is-invalid @enderror"></textarea>
                                @error('form.categoria')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Marca:</strong></label>
                                <textarea  wire:model.lazy="form.marca" class="form-control @error('form.marca') is-invalid @enderror"></textarea>
                                @error('form.marca')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Modelo:</strong></label>
                                <textarea  wire:model.lazy="form.modelo" class="form-control @error('form.modelo') is-invalid @enderror"></textarea>
                                @error('form.modelo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Color:</strong></label>
                                <textarea  wire:model.lazy="form.color" class="form-control @error('form.color') is-invalid @enderror"></textarea>
                                @error('form.color')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Nº de VIM:</strong></label>
                                <textarea  wire:model.lazy="form.VIM" class="form-control @error('form.VIM') is-invalid @enderror"></textarea>
                                @error('form.VIM')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Nº de Serie/Chasis:</strong></label>
                                <textarea  wire:model.lazy="form.serie_chasis" class="form-control @error('form.serie_chasis') is-invalid @enderror"></textarea>
                                @error('form.serie_chasis')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Nº de Motor:</strong></label>
                                <textarea  wire:model.lazy="form.num_motor" class="form-control @error('form.num_motor') is-invalid @enderror"></textarea>
                                @error('form.num_motor')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Carrocería:</strong></label>
                                <textarea  wire:model.lazy="form.carroceria" class="form-control @error('form.carroceria') is-invalid @enderror"></textarea>
                                @error('form.carroceria')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Potencia del motor:</strong></label>
                                <textarea  wire:model.lazy="form.potencia_motor" class="form-control @error('form.potencia_motor') is-invalid @enderror"></textarea>
                                @error('form.potencia_motor')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Form. Rodante:</strong></label>
                                <textarea  wire:model.lazy="form.form_rodante" class="form-control @error('form.form_rodante') is-invalid @enderror"></textarea>
                                @error('form.form_rodante')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Tipo de Combustible:</strong></label>
                                <textarea  wire:model.lazy="form.combustible" class="form-control @error('form.combustible') is-invalid @enderror"></textarea>
                                @error('form.combustible')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Versión:</strong></label>
                                <textarea  wire:model.lazy="form.version" class="form-control @error('form.version') is-invalid @enderror"></textarea>
                                @error('form.version')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Año de Fabricación:</strong></label>
                                <textarea  wire:model.lazy="form.anio_fabricacion" class="form-control @error('form.anio_fabricacion') is-invalid @enderror"></textarea>
                                @error('form.anio_fabricacion')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Año del Modelo:</strong></label>
                                <textarea  wire:model.lazy="form.anio_modelo" class="form-control @error('form.anio_modelo') is-invalid @enderror"></textarea>
                                @error('form.anio_modelo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Nº de Asientos:</strong></label>
                                <textarea  wire:model.lazy="form.asientos" class="form-control @error('form.asientos') is-invalid @enderror"></textarea>
                                @error('form.asientos')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Nº de Pasajeros:</strong></label>
                                <textarea  wire:model.lazy="form.pasajeros" class="form-control @error('form.pasajeros') is-invalid @enderror"></textarea>
                                @error('form.pasajeros')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Nº de Ruedas:</strong></label>
                                <textarea  wire:model.lazy="form.ruedas" class="form-control @error('form.ruedas') is-invalid @enderror"></textarea>
                                @error('form.ruedas')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Ejes:</strong></label>
                                <textarea  wire:model.lazy="form.ejes" class="form-control @error('form.ejes') is-invalid @enderror"></textarea>
                                @error('form.ejes')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Cilindros:</strong></label>
                                <textarea  wire:model.lazy="form.cilindros" class="form-control @error('form.cilindros') is-invalid @enderror"></textarea>
                                @error('form.cilindros')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Logitud:</strong></label>
                                <textarea  wire:model.lazy="form.longitud" class="form-control @error('form.longitud') is-invalid @enderror"></textarea>
                                @error('form.longitud')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Altura:</strong></label>
                                <textarea  wire:model.lazy="form.altura" class="form-control @error('form.altura') is-invalid @enderror"></textarea>
                                @error('form.altura')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Ancho:</strong></label>
                                <textarea  wire:model.lazy="form.ancho" class="form-control @error('form.ancho') is-invalid @enderror"></textarea>
                                @error('form.ancho')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Cilindrada:</strong></label>
                                <textarea  wire:model.lazy="form.cilindrada" class="form-control @error('form.cilindrada') is-invalid @enderror"></textarea>
                                @error('form.cilindrada')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Peso en Bruto:</strong></label>
                                <textarea  wire:model.lazy="form.peso_bruto" class="form-control @error('form.peso_bruto') is-invalid @enderror"></textarea>
                                @error('form.peso_bruto')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Peso Neto:</strong></label>
                                <textarea  wire:model.lazy="form.peso_neto" class="form-control @error('form.peso_neto') is-invalid @enderror"></textarea>
                                @error('form.peso_neto')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Carga Útil:</strong></label>
                                <textarea  wire:model.lazy="form.carga_util" class="form-control @error('form.carga_util') is-invalid @enderror"></textarea>
                                @error('form.carga_util')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Firma:</strong></label>
                                <textarea  wire:model.lazy="form.firma" class="form-control @error('form.firma') is-invalid @enderror"></textarea>
                                @error('form.firma')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Fecha:</strong></label>
                                <textarea  wire:model.lazy="form.fecha" class="form-control @error('form.fecha') is-invalid @enderror"></textarea>
                                @error('form.fecha')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" wire:loading wire:target="guardar">
                    <div class="col pl-4 pr-4">
                        <div class="alert alert-info">
                            <h5>Guardado datos, espere por favor <i class="fas fa-spinner fa-spin"></i></h5>
                        </div>
                    </div>
                </div>
                @if(session()->has('error'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session()->get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('dashboard') }}" class="btn btn-danger pull-right"><i class="fa fa-chevron-circle-left"></i> Volver</a>
                    <button type="submit" class="btn btn-success pull-right">Guardar y agregar otro <i class="fa fa-save"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener('livewire:load', function () {

           /* $('#desde').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true
            });

            $('#hasta').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true
            });

            $("#desde").change(function () {
                @this.form.vigencia_desde = this.value.toString();
                console.log(@this.form.vigencia_desde);
            });*/

            new Pikaday({
                field: document.getElementById('fecha_titulo'),
                format: 'DD/MM/YYYY',
                i18n: {
                    previousMonth : 'Mes Anterior',
                    nextMonth     : 'Siguiente Mes',
                    months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                    weekdays      : ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
                    weekdaysShort : ['Dom','Lun','Mar','Mi','Ju','Vi','Sa']
                },
            });

            new Pikaday({
                field: document.getElementById('hasta'),
                format: 'DD/MM/YYYY',
                i18n: {
                    previousMonth : 'Mes Anterior',
                    nextMonth     : 'Siguiente Mes',
                    months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                    weekdays      : ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
                    weekdaysShort : ['Dom','Lun','Mar','Mi','Ju','Vi','Sa']
                },
                
            });



        });

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
@endpush

