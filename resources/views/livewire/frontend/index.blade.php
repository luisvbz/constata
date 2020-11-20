<div class="row justify-content-center" xmlns="http://www.w3.org/1999/html">
    @if(!$showResults)
    <div wire:loading wire:target="consultar">
        <div class="loading-consulta">
            <div class="loader">
                <img src="{{ asset('frontend/img/loader.svg') }}"/>
                <br>
                Consultando...
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 mt-5">
        <div class="card shadow mb-4" style="border-radius: 10px">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image" style="border-radius: 10px 0px 0px 10px"></div>
                    <div class="col-lg-6 form-placa">
                        <div class="text-center">
                            <img src="/logo.png" style="height: 80px;"/>
                        </div>
                        <div class="p-4">
                            <div class="text-center">
                                <h1 class="h5 text-gray-900 mb-4"><strong>CONSULTA DE CERTIFICADOS CITV</strong></h1>
                            </div>
                            <form class="user" wire:submit.prevent="consultar">
                                <div class="form-group">
                                    <label><strong>N° de Placa</strong></label>
                                    <input wire:model.debounce.1000ms="placa" type="text"
                                            onkeyup="mayus(this);"
                                            class="form-control form-control-user custom-control  @error('placa') is-invalid @enderror">
                                    @error('placa')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="text-center mb-2" wire:ignore>
                                        {!! captcha_img('flat'); !!}
                                    </div>
                                    <label><strong>Ingrese el Captcha</strong></label>
                                    <input wire:model.debounce.1000ms="captcha" type="text"
                                           class="form-control form-control-user custom-control  @error('captcha') is-invalid @enderror">
                                    @error('captcha')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                    @enderror
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
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    <span style="font-size: 1.2rem;">CONSULTAR <i class="fas fa-search"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-10 col-md-12 col-sm-12 mt-5 col-resultados">
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span><strong>RESULTADOS</strong></span>
                <a href="/" class="btn btn-primary">Nueva Consulta</a>
            </div>
            <div class="card-body">
                <div id="divDetalle" style="display: block;">
                    @foreach($certificados as $key => $certificado)
                    <div class="row" style="padding-bottom: 5px;">
                        @if($key === 0)
                            <div class="col-sm-8"><span class="textoTituloCeldaPapeleta cc_cursor">&nbsp;<strong>ÚLTIMO DOCUMENTO REGISTRADO</strong></span></div>
                        @elseif($key === 1)
                            <div class="col-sm-8"><span class="textoTituloCeldaPapeleta cc_cursor">&nbsp;<strong>PENULTIMO DOCUMENTO REGISTRADO</strong></span></div>
                        @endif

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <br />
                                <div>
                                    <table class="table table-bordered table-striped" cellspacing="0" rules="all" border="1" style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                        <tr class="gridHead">
                                            <th scope="col">EMPRESA CERTIFICADORA</th>
                                            <th scope="col">DIRECCIÓN</th>
                                        </tr>
                                        <tr class="gridItemGroup" style="height: 19px;">
                                            <td align="center" style="width: 35%;">{{ $certificado->empresa }}</td>
                                            <td align="center" style="width: 65%;">{{ $certificado->direccion }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <div>
                                    <table class="table table-bordered table-striped" cellspacing="0" rules="all" border="1" style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                        <tr class="gridHead">
                                            <th scope="col">PLACA</th>
                                            <th scope="col">NRO DE CERTIFICADO</th>
                                            <th scope="col">VIGENTE DESDE</th>
                                            <th scope="col">VIGENTE HASTA</th>
                                            <th scope="col">RESULTADO INSPECCIÓN</th>
                                            <th scope="col">ESTADO</th>
                                        </tr>
                                        <tr class="gridItemGroup" style="height: 19px;">
                                            <td align="center" style="width: 17%;">{{ $certificado->placa }}</td>
                                            <td align="center" style="width: 24%;">{{ $certificado->codigo }}</td>
                                            <td align="center" style="width: 12%;">{{ $certificado->vigente_desde | dateFormat }}</td>
                                            <td align="center" style="width: 12%;">{{ $certificado->vigente_hasta | dateFormat }}</td>
                                            <td align="center" style="width: 20%;">{{ $certificado->resultado_inspeccion }}</td>
                                            <td align="center" style="width: 15%;">
                                                <strong>
                                                    @if($certificado->state)
                                                    <span class="text-success">VIGENTE</span>
                                                    @else
                                                    <span class="text-danger">VENCIDO</span>
                                                    @endif
                                                </strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <br />
                                <div>
                                    <table class="table table-bordered table-striped" cellspacing="0" rules="all" border="1" id="gvBonificacion" style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                        <tr class="gridHead">
                                            <th scope="col">ÁMBITO</th>
                                            <th scope="col">TIPO DE SERVICIO</th>
                                        </tr>
                                        <tr class="gridItemGroup" style="height: 19px;">
                                            <td align="center" style="width: 50%;">{{ $certificado->ambito }}</td>
                                            <td align="center" style="width: 50%;">{{ $certificado->servicio }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    @endif
</div>

@push('js')
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
@endpush
