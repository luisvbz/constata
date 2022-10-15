<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sunarp - Tarjetas Vehiculares</h1>
        <div>
            <a href="{{ route('sunarp.nuevo') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Nueva Tarjeta
            </a>
            <a href="{{ route('sunarp.config') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-cog fa-sm text-white-50"></i> Configuración
            </a>
            {{--<a  href="{{ route('carga.masiva') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                <i class="fas fa-file-excel fa-sm text-white-50"></i> Carga Masiva
            </a>--}}
        </div>
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
    <div class="row" wire:loading wire:target="getSunarpPdf">
        <div class="col pr-4">
            <div class="alert alert-info">
                <h5>Generando tarjeta Sunarp, espere por favor <i class="fas fa-spinner fa-spin"></i></h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Tarjetas</h6>
                    <span>Total Registrados: <strong>{{ $total  }}</strong></span>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Marca/Modelo</th>
                            <th scope="col">Nº Título</th>
                            <th scope="col">Fecha</th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody x-data="dataItems()">
                        @forelse ($certificados as $key => $tarjeta)
                            <tr>
                                <td class="text-left">
                                    {{ $tarjeta->codigo_verificacion }}
                                </td>
                                <td>{{ $tarjeta->placa }}</td>
                                <td>{{ $tarjeta->marca }}/{{ $tarjeta->modelo }}</td>
                                <td class="text-left">{{ $tarjeta->num_titulo }}-{{ $tarjeta->anio_titulo }}</td>
                                <td>{{ $tarjeta->fecha | dateFormat }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-bars"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="javascript:void(0);" x-on:click="showModalDetalle({{ $tarjeta }})"><i class="fas fa-search"></i> Ver tarjeta</a>
                                            <a class="dropdown-item" href="{{ route('sunarp.editar', [$tarjeta->codigo_verificacion]) }}"><i class="fas fa-edit"></i> Editar registro</a>
                                            <a class="dropdown-item" href="javascript:void(0);" x-on:click="showModalDelete({{ $tarjeta }})"><i class="fas fa-trash"></i> Eliminar registro</a>
                                            <a class="dropdown-item" href="javascript:void(0);" x-on:click="copySunarpTarjeta($event, {{ $tarjeta }}, '{{ route('sunar.ver.tarjeta', ['codigo' => $tarjeta->codigo_verificacion]) }}')"><i class="fas fa-copy"></i> Copiar enlace de tarjeta</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">

                                    No hay registros disponibles
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div>
                        <div>
                            {{ $certificados->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Filtros <i class="fas fa-filter"></i>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label><strong>Placa</strong></label>
                        <input class="form-control" wire:model.defer="placa">
                    </div>
                    <div class="form-group">
                        <label><strong>Codigo</strong></label>
                        <input class="form-control"  wire:model.defer="codigo">
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <button wire:click="filtrar" type="button" class="btn btn-primary w-50 mr-2">Filtrar <i  class="fas fa-search"></i></button>
                    <button wire:click="limpiar" type="button" class="btn btn-danger w-50">Limpiar <i  class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal de eliminacion--}}
    <div x-data="dataModalDelete()" class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mensajeDelete">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button @click="eliminarRegistro()" type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal detalles--}}
    <div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tarjeta Sunarp <span id="placa"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="" frameborder="0" id="pdf-iframe" style="width:100%;height:400px;"></iframe>
                </div>
                <div class="modal-footer">
                    <a id="link-download" href="" class="btn btn-primary" download=""><i class="fas fa-download"></i> Descargar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>

    function dataModalDelete() { 
        return {
            eliminarRegistro() {
                @this.eliminarRegistro().then(rs => {
                    $('#deleteModal').modal('hide');
                })
            },
        }
    }

    function dataItems() {
        return {
            key: '',
            itemSel: {},
            showModalDelete(item)
            {
                @this.item_id = item.id;
                $('#mensajeDelete').html(`Seguro(a) que desea eliminar <strong>${item.placa}</strong> de la base de datos?`);
                $('#deleteModal').modal('show');
            },
            showModalDetalle (item) {
                @this.getSunarpPdf(item).then(rs => {
                    $('#link-download').attr('href', rs);
                    $('#link-download').attr('download', item.codigo_verificacion);
                    $('#pdf-iframe').attr('src', rs);
                    $('#modalDetalle').modal('show');
                })
            },
            copySunarpTarjeta(event, item, link) {
                let input = document.createElement('textarea');
                input.value = link;
                document.body.appendChild(input);
                input.select();
                document.execCommand('copy')
                document.body.removeChild(input);
            }
        }
    }
</script>
@endpush
<!-- Content Row -->
