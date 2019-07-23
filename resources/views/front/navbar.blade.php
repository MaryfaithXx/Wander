<!-- main-header -->
	<header class="main-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8">
					<img class="iso" src="images/wander-iso.png" alt="wander isotype"/>
					<a href= "index.php"><img class="logo" src="images/wander-logo.png" alt="wander logotype"/></a>
				</div>
				<!-- Verificar si el usuario NO estรก logueado para mostrar los enlaces Register y Login -->
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

				<div class="col-2">
					<a href="register.php" class="register-link">Registrarme</a>
				</div>
				<div class="col-2">
					<a id="login-button" href="#">Iniciar sesion</a>
				</div>

        @endif

				{{-- require_once("login.php"); --}}
				{{--  else:  --}}
				<div class="col-2">
					<img class="nav-avatar" src="/storage/avatars/{{Auth::user()->avatar}}" width=100>
				</div>
				<div class="col-2">
					<div class="user-menu">
						<a class="dropdown-button">{{Auth::user()->name}} <i class="fa fa-caret-down"></i></a>
							<div class="dropdown-content">
							  <a href="profile.php">Mi perfil</a>
							  <a href="logout.php">Salir</a>
							</div>
					</div>
				</div>
				{{-- endif --}}
			</div>
		</div>

	</header>
	<!-- /main-header -->

	{{--reemplazar la lógica de validación de logueo y link a formulario de login.--}}
