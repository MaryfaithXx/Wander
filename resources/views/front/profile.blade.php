{{-- require_once("register-login-controller.php"); --}}

	@extends('front.template')

	@section('pageTitle', 'Wander - Mi Perfil')

	@section('mainSection')


	{{--Si no está logueda la persona la redirijo al login
	if ( !isLogged() ) {
		header('location: login.php');
		exit;
	--}}

	{{--$theUser = $_SESSION['userLoged'];--}}


		<!-- Perfil Usuario -->
		<div class="container-fluid">
			<div class="row">
				<!--columna 1-->
				<div class="col-12 col-md-8">
					<div class="profile">
						<div class="cover">
							<img src="images/coverImage.jpg" class="coverImage">
						</div>
						<div class="user">
							<div class="avatar">
								<img src="data/avatars/" {{Auth::user()->avatar}} alt="imagen usuario" class="avatarUser">
							</div>
							<div class="info">
								<h3> {{Auth::user()->name}} </h3>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i> ¿Dónde estás ahora? -   <i class="fa fa-globe"></i> País de Residencia</p>
								<p><i class="fa fa-flag" aria-hidden="true"></i> {{Auth::user()->country}} <i class="fa fa-bolt" aria-hidden="true"></i>      Idiomas</p>
								<a href="#Editar" class="modal-link"> Editar Perfil </a>
							</div>
						</div>
					</div>
				</div>
				<!--/columna 1-->

				<!--columna 2-->

				<!--Perfil Viajero-->
				<div class="col-12 col-md-4">
					<h2 class="tituloEventos"> Perfil de Viajero</h2>

					<div class="container actividades">
						<div class="row">
							<div class="col-3 column">
								<img src="images/cities.jpg" alt="ciudades" >
								<span class= "label"> 24 <br> CIUDADES </span>
							</div>
							<div class="col-3 column">
								<img src="images/calendar.png" alt="eventos" >
								<span class= "label"> 14 <br> EVENTOS</span>
							</div>
							<div class="col-3 column">
								<a href="connections.php">
									<img src="images/conexiones.png" alt="conexiones">
										<span class= "label"> 120 CONEXIONES</span>
								</a>

							</div>
						</div>
					</div>
					<br>
					<br>
					<!--Intereses-->
					<div class="Interests">
						<h3> Intereses </h3>
						<a class="interest" href="#DeportesExtremos">Deportes Extremos</a>
						<a class="interest" href="#ComidaAsiatica">Comida Asiática</a>
						<a class="interest" href="#Naturaleza">Naturaleza</a>
					</div>
					<br>
					<br>
					<div class="rating">
						<h4> Rating</h4>
						<span class="fa fa-star checked fa-2x"></span>
						<span class="fa fa-star checked fa-2x"></span>
						<span class="fa fa-star checked fa-2x"></span>
						<span class="fa fa-star checked fa-2x"></span>
						<span class="fa fa-star fa-2x"></span>
					</div>
				</div>
				<!--/columna 2-->
			</div>
			<br>
			<br>
			<hr class="special-hr">
		</div>
		<!-- /Perfil Usuario -->

		<!-- Eventos -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-8">
					<h2 class="tituloEventos">Eventos</h2>
					<ul class="timeline">
					<h3>2019</h3>
						<li>
							<div class="item">
								<span> Abr </span>
								<div class="content">
									<h3>Coachella</h3>
									<p>lorem</p>
								</div>
							</div>
						</li>
						<li>
							<div class="item">
								<span> Mar </span>
								<div class="content">
									<h3>Lorem</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
								</div>
							</div>
						</li>
						<li>
							<div class="item">
								<span> Feb </span>
								<div class="content">
									<h3>Lorem</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!--/Eventos-->

				<!-- Grupos-->

				<div class="col-12 col-md-4">
					<h2 class="tituloEventos"> Grupos </h2>
					<div class="row">
						<div class="col-12">
							<img class="groups-image" src="images/asian-food.jpg" alt="asian food">
							<span class="tile-label">COMIDA ASIÁTICA</span>
						</div>

						<div class="col-12">
							<img class="groups-image" src="images/parachute.jpg" alt="paracaidas">
							<span class="tile-label">Bautismo Paracaidas 2019</span>
						</div>
					</div>
				</div>
				<!--/Grupos-->

			</div>
		</div>

	@endsection
