<!-- main-header -->
	<header class="main-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8">
					<img class="iso" src="images/wander-iso.png" alt="wander isotype"/>
					<a href= "index.php"><img class="logo" src="images/wander-logo.png" alt="wander logotype"/></a>
				</div>
				<!-- Verificar si el usuario NO estรก logueado (Guest) para mostrar los enlaces Register y Login -->
				@guest
				<div class="col-2">
					<a href="{{ route('register') }}" class="register-link">Registrarme</a>
				</div>
				<div class="col-2">
					<a id="login-button" href="{{ route('login') }}">Iniciar sesion</a>
				</div>

				@endguest

				@auth
				<div class="col-2">
					<img class="nav-avatar" src="/storage/avatars/{{Auth::user()->avatar}}" width=100>
				</div>
				<div class="col-2">
					<div class="user-menu">
						<a class="dropdown-button">{{Auth::user()->name}} <i class="fa fa-caret-down"></i></a>
							<div class="dropdown-content">
							  <a href="{{ route('profile') }}">Mi perfil</a>
							  <a href="{{ route('logout') }}"
							  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a>	 
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
							</div>
					</div>
				</div>
				@endauth
			</div>
		</div>

	</header>
	<!-- /main-header -->
