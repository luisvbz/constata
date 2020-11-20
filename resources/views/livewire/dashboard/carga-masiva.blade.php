<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Carga masiva</h1>
    </div>
    <!-- Content Row -->
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
    @if(session()->has('message'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-check-circle"></i> Éxito!</strong> {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Seleccióne el archivo para verificar cargar certificados
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="verificarArchivo" class="form-inline">
                        <div class="form-group">
                            <input type="file" class="form-control-file" wire:model="archivo">
                            @error('archivo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div wire:loading wire:target="photo">Cargando... <i class="fas fa-spinner fa-spin"></i></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Verificar Archivo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning">
               Todo registro que ya se encuentre registrado en la base de datos sera omitido en esta lista
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Lista de certificados en el archivo excel
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Código</th>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>Empresa</th>
                                <th>Dirección</th>
                                <th>Ambito</th>
                                <th>Servicio</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($certificados as $key => $certificado)
                            <tr>
                                <td>{{ $certificado['placa'] }}</td>
                                <td>{{ $certificado['codigo'] }}</td>
                                <td>{{ $certificado['vigente_desde'] }}</td>
                                <td>{{ $certificado['vigente_hasta'] }}</td>
                                <td>{{ $certificado['empresa'] }}</td>
                                <td>{{ $certificado['direccion'] }}</td>
                                <td>{{ $certificado['ambito'] }}</td>
                                <td>{{ $certificado['servicio'] }}</td>
                                <td>{{ $certificado['resultado'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">No has seleccionado el archivo a cargar</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                @if(count($certificados) > 0)
                <div class="card-footer">
                    <button wire:loading.remove class="btn btn-primary" wire:click="procesarLista">Procesar Lista <i class="fas fa-cog"></i></button>
                    <button wire:loading wire:target="procesarLista" class="btn btn-primary" disabled>Procesando Lista <i class="fas fa-cog fa-spin"></i></button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
