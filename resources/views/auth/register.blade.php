@extends('front.template')

@section('pageTitle', 'Registro')

@section('mainSection')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulario de Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre y apellido') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
								dataname = "Nombre y apellido">

						<div class="invalid-feedback">
							Aquí va el error del Nombre y Apellido
						</div>
						
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username"
								dataname="Nombre de usuario">

						<div class="invalid-feedback">
							Aquí va el error del Nombre de usuario
						</div>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
								dataname="Email">

							<div class="invalid-feedback">
								Aquí va el error del Email
							</div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('País de nacimiento') }}</label>

                            <div class="col-md-6">
							
								<select	class="form-control @error('country') is-invalid @enderror"
										name="country"
										id="country"
										value="{{ old('country') }}"
										required autocomplete="country"
										dataname="País de nacimiento"
										>
									<option value="">Elegí un país</option>
								</select>

							<div class="invalid-feedback">
								Aquí va el error del País de nacimiento
							</div>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{-- Api de Provincias --}}

						<div class="form-group row" style="display: none;">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>

                             <div class="col-md-6">
								<select class="form-control @error('state') is-invalid @enderror"
									name="state"
									id="state"
									value="{{ old('state') }}"
									required autocomplete="state"
									dataname="Provincia"
									>
									<option value="">Elegí una provincia</option>
								</select>
								
								<div class="invalid-feedback">
								Aquí va el error de la Provincia
								</div>
                                
								@error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{-- endAPI --}}

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
								dataname="Contraseña">

							<div class="invalid-feedback">
								Aquí va el error de la Contraseña
							</div>
							
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Imagen de perfil') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarme') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/registerValidate.js"></script>
<script src="/js/fetch.js"></script>

@endsection
