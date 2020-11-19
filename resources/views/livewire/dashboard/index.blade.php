<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Certificados</h1>
        <div>
            <a href="{{ route('nuevo.certificado') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Agregar
            </a>
           {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                <i class="fas fa-file-excel fa-sm text-white-50"></i> Carga Masiva
            </a> --}}
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
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de certificados</h6>
                    <span>Total Registrados: <strong>{{ $total  }}</strong></span>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Estado</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Vigencia Desde</th>
                            <th scope="col">Vigencia Hasta</th>
                            <th scope="col">Empresa</th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody x-data="dataItems()">
                        @forelse ($certificados as $key => $certificado)
                            <tr>
                                <td class="text-center">
                                    <i rel="tooltip" title="@if($certificado->state) Vigente @else No vigente @endif" class="fas fa-circle @if($certificado->state) text-success @else text-danger @endif"></i>
                                </td>
                                <td>{{ $certificado->placa }}</td>
                                <td>{{ $certificado->codigo }}</td>
                                <td class="text-center">{{ $certificado->vigente_desde | dateFormat }}</td>
                                <td class="text-center">{{ $certificado->vigente_hasta | dateFormat }}</td>
                                <td>{{ $certificado->empresa }}</td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-bars"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="javascript:void(0);" x-on:click="showModalDetalle({{ $certificado }})"><i class="fas fa-search"></i> Ver mas detalles</a>
                                            <a class="dropdown-item" href="{{ route('editar.certificado', [$certificado->placa]) }}"><i class="fas fa-edit"></i> Editar registro</a>
                                            <a class="dropdown-item" href="javascript:void(0);" x-on:click="showModalDelete({{ $certificado }})"><i class="fas fa-trash"></i> Eliminar registro</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">

                                    No hay registros
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
                        <input class="form-control" wire:model.debounce.500ms="placa">
                    </div>
                    <div class="form-group">
                        <label><strong>Codigo</strong></label>
                        <input class="form-control"  wire:model.debounce.500ms="codigo">
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
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
                    <button wire:click="eliminarRegistro" type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal detalles--}}
    <div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información detallada <span id="placa"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detalles">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    window.addEventListener('item-deleted', () => {
        $('#deleteModal').modal('hide');
    });

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
              $('#placa').html(`<strong>${item.placa}</strong>`);
                $('#detalles').html(`
                    <p><strong>Placa: </strong>${item.placa}</p>
                    <p><strong>Codigo: </strong>${item.codigo}</p>
                    <p><strong>Vigencia Desde: </strong>${item.vigente_desde}</p>
                    <p><strong>Vigencia Hasta: </strong>${item.vigente_hasta}</p>
                    <p><strong>Empresa: </strong>${item.empresa}</p>
                    <p><strong>Dirección: </strong>${item.direccion}</p>
                    <p><strong>Ámbito: </strong>${item.ambito}</p>
                    <p><strong>Servicio: </strong>${item.servicio}</p>
                    <p><strong>Resultado Inspección: </strong>${item.resultado_inspeccion}</p>
                `);
              $('#modalDetalle').modal('show');
          }
      }
    }
</script>
@endpush
<!-- Content Row -->
