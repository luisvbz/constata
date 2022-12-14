<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Configuración para Tarjeta Sunarp</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="save">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Configuración de títulos</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-12">
                            <div class="form-group">
                                <label><strong>Título 1 - Nombre de país</strong></label>
                                <input type="text" wire:model.lazy="form.pais" class="form-control @error('form.pais') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Título 1 - Nombre de país" />
                                @error('form.pais')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-sm-12">
                            <div class="form-group">
                                <label><strong>Título 2 - Entidad</strong></label>
                                <input type="text" wire:model.lazy="form.entidad" class="form-control @error('form.entidad') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Título 2 - Entidad" />
                                @error('form.entidad')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-sm-12">
                            <div class="form-group">
                                <label><strong>Título 3 - Título</strong></label>
                                <input type="text" wire:model.lazy="form.titulo" class="form-control @error('form.titulo') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Título 3 - Título" />
                                @error('form.titulo')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="font-weight-bold h5 mb-0">Otros datos</div>
                        </div>
                    </div>
                    <div class="border-top my-3"></div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº código de verificación</strong></label>
                                <input type="number" wire:model.lazy="form.codigo_verificacion" class="form-control @error('form.codigo_verificacion') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Nº código de verificación" />
                                @error('form.codigo_verificacion')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº partida registral</strong></label>
                                <input type="number" wire:model.lazy="form.partida_registral" class="form-control @error('form.partida_registral') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Nº partida registral" />
                                @error('form.partida_registral')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de título</strong></label>
                                <input type="number" wire:model.lazy="form.num_titulo" class="form-control @error('form.num_titulo') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Nº de título" />
                                @error('form.num_titulo')
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

