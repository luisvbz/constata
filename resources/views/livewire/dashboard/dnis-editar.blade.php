<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nueva DNI</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="save">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ingrese los datos del nuevo DNI</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de documento</strong></label>
                                <input type="number" wire:model.lazy="form.numero_documento" class="form-control @error('form.numero_documento') is-invalid @enderror" placeholder="Ingrese Nº de documento" />
                                @error('form.numero_documento')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Nº de verificación</strong></label>
                                <input type="number" wire:model.lazy="form.numero_verificacion" class="form-control @error('form.numero_verificacion') is-invalid @enderror" placeholder="Nº de verificación"/>
                                @error('form.numero_verificacion')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Primer Apellido</strong></label>
                                <input type="text" wire:model.lazy="form.primer_apellido" class="form-control text-uppercase @error('form.primer_apellido') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Primer Apellido" />
                                @error('form.primer_apellido')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Segundo Apellido</strong></label>
                                <input type="text" wire:model.lazy="form.segundo_apellido" class="form-control text-uppercase @error('form.segundo_apellido') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Segundo Apellido" />
                                @error('form.segundo_apellido')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Pre-Nombres</strong></label>
                                <input type="text" wire:model.lazy="form.pre_nombres" class="form-control text-uppercase @error('form.pre_nombres') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Pre-Nombres" />
                                @error('form.pre_nombres')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Fecha de Nacimiento</strong></label>
                                <input type="date" wire:model.lazy="form.fecha_nacimiento" class="form-control  @error('form.fecha_nacimiento') is-invalid @enderror" placeholder="Fecha de Nacimiento" />
                                @error('form.fecha_nacimiento')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Ubigeo</strong></label>
                                <input type="number" wire:model.lazy="form.ubigeo" class="form-control  @error('form.ubigeo') is-invalid @enderror" placeholder="Ubigeo" />
                                @error('form.ubigeo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Sexo:</strong></label>
                                <select type="text" wire:model.lazy="form.sexo" class="form-control @error('form.sexo') is-invalid @enderror">
                                    <option value="" disabled>Seleccione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                                @error('form.sexo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Estado Civil:</strong></label>
                                <select type="text" wire:model.lazy="form.estado_civil" class="form-control @error('form.estado_civil') is-invalid @enderror">
                                    <option value="" disabled>Seleccione</option>
                                    <option value="S">Soltero/a</option>
                                    <option value="C">Casado/a</option>
                                    <option value="V">Viudo/a</option>
                                </select>
                                @error('form.estado_civil')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Fecha de Inscripción:</strong></label>
                                <input type="date" wire:model.lazy="form.fecha_incripcion" class="form-control @error('form.fecha_incripcion') is-invalid @enderror" placeholder="Fecha de Inscripción"/>
                                @error('form.fecha_incripcion')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Fecha de Emisión:</strong></label>
                                <input type="date" wire:model.lazy="form.fecha_emision" class="form-control @error('form.fecha_emision') is-invalid @enderror" placeholder="Fecha de Emisión"/>
                                @error('form.fecha_emision')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Fecha de Caducidad:</strong></label>
                                <input type="date" wire:model.lazy="form.fecha_caducidad" class="form-control @error('form.fecha_caducidad') is-invalid @enderror" placeholder="Fecha de Caducidad"/>
                                @error('form.fecha_caducidad')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Departamento:</strong></label>
                                <input type="text" wire:model.lazy="form.departamento" class="form-control text-uppercase @error('form.departamento') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Departamento" />
                                @error('form.departamento')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Provincia:</strong></label>
                                <input type="text" wire:model.lazy="form.provincia" class="form-control text-uppercase @error('form.provincia') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Provincia" />
                                @error('form.provincia')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Distrito:</strong></label>
                                <input type="text" wire:model.lazy="form.distrito" class="form-control text-uppercase @error('form.distrito') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Distrito" />
                                @error('form.distrito')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><strong>Dirección:</strong></label>
                                <input type="text" wire:model.lazy="form.direccion" class="form-control text-uppercase @error('form.direccion') is-invalid @enderror" placeholder="Dirección..." onkeyup="mayus(this);" placeholder="Distrito" />
                                @error('form.direccion')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Donante:</strong></label>
                                <select type="text" wire:model.lazy="form.donante" class="form-control @error('form.donante') is-invalid @enderror">
                                    <option value="" disabled>Seleccione</option>
                                    <option value="SI">Si</option>
                                    <option value="NO">No</option>
                                </select>
                                @error('form.donante')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label><strong>Grupo de votación:</strong></label>
                                <input type="number" wire:model.lazy="form.grupo_votacion" class="form-control @error('form.grupo_votacion') is-invalid @enderror" placeholder="Grupo de votación" />
                                @error('form.grupo_votacion')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Foto:</strong></label>
                                <input type="file" wire:model.lazy="form.foto" class="form-control @error('form.foto') is-invalid @enderror" accept=".png,.jpg,.jpeg,.bmp,.gif" />
                                @error('form.foto')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{--<div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Huella:</strong></label>
                                <input type="file" wire:model.lazy="form.huella" class="form-control @error('form.huella') is-invalid @enderror" accept=".png,.jpeg,.bmp,.gif" />
                                @error('form.huella')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>--}}
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
                </div>
                <div class="row" wire:loading wire:target="save">
                    <div class="col pl-4 pr-4">
                        <div class="alert alert-info">
                            <h5>Guardando datos, espere por favor <i class="fas fa-spinner fa-spin"></i></h5>
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
                    <a href="{{ route('dnis') }}" class="btn btn-danger pull-right"><i class="fa fa-chevron-circle-left"></i> Volver</a>

                    <button type="submit" class="btn btn-success pull-right">Guardar <i class="fa fa-save"></i></button>
                      
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener('livewire:load', function () {

            /* new AirDatepicker('#fecha_titulo', {
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
            }); */

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


