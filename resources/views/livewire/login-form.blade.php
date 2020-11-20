<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center mb-5">
                                <img src="/logo.png" style=" height: 85px;"/>
                            </div>
                            <form class="user" wire:submit.prevent="loginAttemp">
                                <div class="form-group">
                                    <input wire:model.lazy="username" type="text" class="form-control form-control-user"
                                           placeholder="Nombre de usuario">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input wire:model.lazy="password" type="password" class="form-control form-control-user"
                                           placeholder="Contraseña">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @error('credenciales')
                                <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
                                    <strong>Error!</strong> {{ $message }}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Entrar
                                </button>
                                <a href="/" type="submit" class="btn btn-success btn-user btn-block">
                                    Ir a página principal
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Olvide mi contraseña!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
