<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perfil de usuario</h1>
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
            <form wire:submit.prevent="actualizar">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Editar datos de usuario</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><strong>Usuario</strong></label>
                                    <input wire:model.lazy="user.username" class="form-control @error('user.username') is-invalid @enderror"/>
                                    @error('user.username')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><strong>Nombre y Apellido </strong></label>
                                    <input wire:model.lazy="user.name" class="form-control  @error('user.name') is-invalid @enderror"/>
                                    @error('user.name')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label><strong>Correo electrónico</strong></label>
                                    <input wire:model.lazy="user.email" class="form-control @error('user.email') is-invalid @enderror"/>
                                    @error('user.email')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><strong>Crear nueva clave</strong></label>
                                    <input type="password" wire:model.lazy="user.password" class="form-control @error('user.password') is-invalid @enderror"/>
                                    @error('user.password')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><strong>Repita la nueva clave </strong></label>
                                    <input type="password" wire:model.lazy="user.password_confirmation" class="form-control  @error('user.password_confirmation') is-invalid @enderror"/>
                                    @error('user.password_confirmation')
                                    <p class="help-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info">
                            <strong>Deje los campos de la clave en blanco si desean mantener su clave actual.</strong>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-danger pull-right"><i class="fa fa-chevron-circle-left"></i> Volver</a>
                        <button type="submit" class="btn btn-success pull-right">Guardar cambios <i class="fa fa-save"></i></button>
                    </div>
                </div>
            </form>
    </div>
</div>
