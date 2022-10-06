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
                        {{--<div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Código de Verificación</strong></label>
                                <input wire:model.lazy="form.codigo_verificacion" class="form-control @error('form.codigo_verificacion') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Ingrese el cód. de verificación"/>
                                @error('form.codigo_verificacion')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>--}}
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
                                <input id="fecha_titulo" wire:model.lazy="form.fecha_titulo" class="form-control  @error('form.fecha_titulo') is-invalid @enderror" placeholder="dd/mm/yyyy" readonly />
                                @error('form.fecha_titulo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Zona Registral:</strong></label>
                                <select wire:model.lazy="form.zona_registral" class="form-control @error('form.zona_registral') is-invalid @enderror">
                                    <option value="" disabled>Seleccione</option>
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
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Sede Registral:</strong></label>
                                <select wire:model.lazy="form.sede_registral" class="form-control @error('form.sede_registral') is-invalid @enderror">
                                    <option value="" disabled>Seleccione</option>
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
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Placa:</strong></label>
                                <input wire:model.lazy="form.placa" class="form-control text-uppercase @error('form.placa') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Placa..."/>
                                @error('form.placa')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><strong>Partida Registral:</strong></label>
                                <input wire:model.lazy="form.partida_registral" class="form-control  @error('form.partida_registral') is-invalid @enderror" placeholder="Nº de partida registral"/>
                                @error('form.partida_registral')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><strong>DUA/DAM</strong></label>
                                <input  wire:model.lazy="form.DUA_DAM" class="form-control @error('form.DUA_DAM') is-invalid @enderror" placeholder="Ingrese el DUA/DAM"/>
                                @error('form.DUA_DAM')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Categoría:</strong></label>
                                <input type="text" wire:model.lazy="form.categoria" class="form-control text-uppercase @error('form.categoria') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Categoría" />
                                @error('form.categoria')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Marca:</strong></label>
                                <input type="text" wire:model.lazy="form.marca" class="form-control text-uppercase @error('form.marca') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Marca" />
                                @error('form.marca')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Modelo:</strong></label>
                                <input type="text" wire:model.lazy="form.modelo" class="form-control text-uppercase @error('form.modelo') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Modelo" />
                                @error('form.modelo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Color 1:</strong></label>
                                <input type="text" wire:model.lazy="form.color1" class="form-control text-uppercase @error('form.color1') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Color" />
                                @error('form.color1')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Color 2:</strong></label>
                                <input type="text" wire:model.lazy="form.color2" class="form-control text-uppercase @error('form.color2') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Color" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Color 3:</strong></label>
                                <input type="text" wire:model.lazy="form.color3" class="form-control text-uppercase @error('form.color3') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Color" />
                            </div>
                        </div>
                    </div>

                    <div class="border-top my-3"></div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de VIM:</strong></label>
                                <input type="text" wire:model.lazy="form.VIM" class="form-control text-uppercase @error('form.VIM') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Nº de VIM" />
                                @error('form.VIM')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de Serie/Chasis:</strong></label>
                                <input type="text" wire:model.lazy="form.serie_chasis" class="form-control text-uppercase @error('form.serie_chasis') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Serie/Chasis" />
                                @error('form.serie_chasis')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de Motor:</strong></label>
                                <input type="text" wire:model.lazy="form.num_motor" class="form-control text-uppercase @error('form.num_motor') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Nº de motor" />
                                @error('form.num_motor')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Carrocería:</strong></label>
                                <input type="text" wire:model.lazy="form.carroceria" class="form-control text-uppercase @error('form.carroceria') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Carrocería..." />
                                @error('form.carroceria')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-top my-3"></div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Potencia del motor:</strong></label>
                                <input type="text" wire:model.lazy="form.potencia_motor" class="form-control text-uppercase @error('form.potencia_motor') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Potencia" />
                                @error('form.potencia_motor')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Form. Rodante:</strong></label>
                                <input type="text" wire:model.lazy="form.form_rodante" class="form-control text-uppercase @error('form.form_rodante') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Form. Rodante" />
                                @error('form.form_rodante')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Tipo de Combustible:</strong></label>
                                <input type="text" wire:model.lazy="form.combustible" class="form-control text-uppercase @error('form.combustible') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Combustible" />
                                @error('form.combustible')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="form-group">
                                <label><strong>Versión:</strong></label>
                                <input type="text" wire:model.lazy="form.version" class="form-control text-uppercase @error('form.version') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Versión" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Año de Fabricación:</strong></label>
                                <input id="anio_fab" type="text" wire:model.lazy="form.anio_fabricacion" class="form-control @error('form.anio_fabricacion') is-invalid @enderror" placeholder="Año de fabricación" readonly/>
                                @error('form.anio_fabricacion')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Año del Modelo:</strong></label>
                                <input id="anio_mod" type="text" wire:model.lazy="form.anio_modelo" class="form-control @error('form.anio_modelo') is-invalid @enderror" placeholder="Año del modelo" readonly/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de Asientos:</strong></label>
                                <input type="text" wire:model.lazy="form.asientos" class="form-control @error('form.asientos') is-invalid @enderror" placeholder="Nº de asientos" />
                                @error('form.asientos')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de Pasajeros:</strong></label>
                                <input type="text" wire:model.lazy="form.pasajeros" class="form-control @error('form.pasajeros') is-invalid @enderror" placeholder="Nº de pasajeros" />
                                @error('form.pasajeros')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-top my-3"></div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de Ruedas:</strong></label>
                                <input type="text" wire:model.lazy="form.ruedas" class="form-control @error('form.ruedas') is-invalid @enderror" placeholder="Nº de ruedas" />
                                @error('form.ruedas')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Ejes:</strong></label>
                                <input type="text" wire:model.lazy="form.ejes" class="form-control @error('form.ejes') is-invalid @enderror" placeholder="Ejes" />
                                @error('form.ejes')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Cilindros:</strong></label>
                                <input type="text" wire:model.lazy="form.cilindros" class="form-control @error('form.cilindros') is-invalid @enderror" placeholder="Nº de cilindros" />
                                @error('form.cilindros')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Logitud:</strong></label>
                                <input type="text" wire:model.lazy="form.longitud" class="form-control @error('form.longitud') is-invalid @enderror" placeholder="Longitud" />
                                @error('form.longitud')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Altura:</strong></label>
                                <input type="text" wire:model.lazy="form.altura" class="form-control @error('form.altura') is-invalid @enderror" placeholder="Altura" />
                                @error('form.altura')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Ancho:</strong></label>
                                <input type="text" wire:model.lazy="form.ancho" class="form-control @error('form.ancho') is-invalid @enderror" placeholder="Ancho" />
                                @error('form.ancho')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Cilindrada:</strong></label>
                                <input type="text" wire:model.lazy="form.cilindrada" class="form-control @error('form.cilindrada') is-invalid @enderror" placeholder="Cilindrada" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Peso en Bruto:</strong></label>
                                <input type="text" wire:model.lazy="form.peso_bruto" class="form-control @error('form.peso_bruto') is-invalid @enderror" placeholder="Peso bruto" />
                                @error('form.peso_bruto')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Peso Neto:</strong></label>
                                <input type="text" wire:model.lazy="form.peso_neto" class="form-control @error('form.peso_neto') is-invalid @enderror" placeholder="Peso neto" />
                                @error('form.peso_neto')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Carga Útil:</strong></label>
                                <input type="text" wire:model.lazy="form.carga_util" class="form-control @error('form.carga_util') is-invalid @enderror" placeholder="Carga útil" />
                                @error('form.carga_util')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Condición:</strong></label>
                                <input type="text" wire:model.lazy="form.condicion" class="form-control @error('form.condicion') is-invalid @enderror" placeholder="Carga útil" />
                                @error('form.condicion')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Firma:</strong></label>
                                <input type="file" wire:model.lazy="form.firma" class="form-control @error('form.firma') is-invalid @enderror" accept=".png,.jpeg,.bmp,.gif" />
                                @error('form.firma')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Fecha y Hora:</strong></label>
                                <input id="fecha_generado" type="text" wire:model.lazy="form.fecha" class="form-control @error('form.fecha') is-invalid @enderror" placeholder="31/12/1999 12:30:30 pm" readonly />
                                @error('form.fecha')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" wire:loading wire:target="save">
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
                    <a href="{{ route('sunarp') }}" class="btn btn-danger pull-right"><i class="fa fa-chevron-circle-left"></i> Volver</a>

                    <button type="submit" class="btn btn-success pull-right">Guardar y ver <i class="fa fa-save"></i></button>
                      
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener('livewire:load', function () {

            new AirDatepicker('#fecha_titulo', {
                onSelect({date, formattedDate, datepicker}) {
                    datepicker.$el.dispatchEvent(new Event('change'));
                },
                locale: {
                    days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                    daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    today: 'Hoy',
                    clear: 'Limpiar',
                    dateFormat: 'dd/MM/yyyy',
                    timeFormat: 'hh:mm aa',
                    firstDay: 1
                }
            });

            new AirDatepicker('#anio_fab', {
                view: 'years',
                minView: 'years',
                dateFormat: 'yyyy',
                onSelect({date, formattedDate, datepicker}) {
                    datepicker.$el.dispatchEvent(new Event('change'));
                },
                locale: {
                    days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                    daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    today: 'Hoy',
                    clear: 'Limpiar',
                    dateFormat: 'dd/MM/yyyy',
                    timeFormat: 'hh:mm aa',
                    firstDay: 1
                }
            });

            new AirDatepicker('#anio_mod', {
                view: 'years',
                minView: 'years',
                dateFormat: 'yyyy',
                onSelect({date, formattedDate, datepicker}) {
                    datepicker.$el.dispatchEvent(new Event('change'));
                },
                locale: {
                    days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                    daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    today: 'Hoy',
                    clear: 'Limpiar',
                    dateFormat: 'dd/MM/yyyy',
                    timeFormat: 'hh:mm aa',
                    firstDay: 1
                }
            });
            
            new AirDatepicker('#fecha_generado', {
                timepicker: true,
                timeFormat: 'hh:mm aa',
                position: 'top left',
                onSelect({date, formattedDate, datepicker}) {
                    datepicker.$el.dispatchEvent(new Event('change'));
                },
                locale: {
                    days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                    daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    today: 'Hoy',
                    clear: 'Limpiar',
                    dateFormat: 'dd/MM/yyyy',
                    timeFormat: 'hh:mm aa',
                    firstDay: 1
                }
            });

        });

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
@endpush

