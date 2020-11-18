<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar certificado</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="guardar">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ingrese los datos del nuevo certificado vehicular</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><strong>Placa</strong></label>
                                <input wire:model.lazy="form.placa" class="form-control @error('form.placa') is-invalid @enderror" onkeyup="mayus(this);" placeholder="Ingrese la placa del vehiculo"/>
                                @error('form.placa')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><strong>Código de Ceritificado</strong></label>
                                <input wire:model.lazy="form.codigo" class="form-control  @error('form.codigo') is-invalid @enderror"" onkeyup="mayus(this);" placeholder="Ingrese la placa del vehiculo"/>
                                @error('form.codigo')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><strong>Vigencia desde:</strong></label>
                                <input wire:model.lazy="form.vigente_desde" class="form-control @error('form.vigente_desde') is-invalid @enderror" id="desde" placeholder="seleccione la fecha"/>
                                @error('form.vigente_desde')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><strong>Vigencia hasta:</strong></label>
                                <input wire:model.lazy="form.vigente_hasta" class="form-control @error('form.vigente_hasta') is-invalid @enderror" id="hasta" placeholder="seleccione la fecha"/>
                                @error('form.vigente_hasta')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Empresa</strong></label>
                                <input wire:model.lazy="form.empresa" class="form-control  @error('form.empresa') is-invalid @enderror" placeholder="Ingrese la empresa certificadora"/>
                                @error('form.empresa')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Ámbito</strong></label>
                                <input wire:model.lazy="form.ambito" class="form-control @error('form.ambito') is-invalid @enderror" placeholder="Ingrese el ámbito"/>
                                @error('form.ambito')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label><strong>Servicio</strong></label>
                                <input  wire:model.lazy="form.servicio" class="form-control @error('form.servicio') is-invalid @enderror" placeholder="Ingrese el servicio"/>
                                @error('form.servicio')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Dirección:</strong></label>
                                <textarea  wire:model.lazy="form.direccion" class="form-control @error('form.direccion') is-invalid @enderror"></textarea>
                                @error('form.direccion')
                                <p class="help-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Resultado de la inspección:</strong></label>
                                <textarea  wire:model.lazy="form.resultado_inspeccion" class="form-control @error('form.resultado_inspeccion') is-invalid @enderror"></textarea>
                                @error('form.resultado_inspeccion')
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
                field: document.getElementById('desde'),
                format: 'DD/MM/YYYY',
                i18n: {
                    previousMonth : 'Mes Anterior',
                    nextMonth     : 'Siguiente Mes',
                    months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                    weekdays      : ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
                    weekdaysShort : ['Dom','Lun','Mar','Mi','Ju','Vi','Sa']
                },
                toString(date, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    var day = date.getDate();
                    day = day < 10 ?`0${day}` : day;
                    const month = date.getMonth() + 1;
                    const year = date.getFullYear();
                    return `${day}/${month}/${year}`;
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
                toString(date, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    var day = date.getDate();
                    day = day < 10 ? `0${day}` : day;
                    const month = date.getMonth() + 1;
                    const year = date.getFullYear();
                    return `${day}/${month}/${year}`;
                },
            });



        });

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
@endpush
