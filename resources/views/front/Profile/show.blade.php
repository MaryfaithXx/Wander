@extends('front.template')

@section('pageTitle', 'Detalle del Usuario ' .  $theUser->name )

@section('mainSection')

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
								<img src="/storage/avatars/{{ $theUser->avatar }}" alt="imagen usuario" class="avatarUser">
							</div>
							<div class="info">
								<h3> {{ $theUser->name }} </h3>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $theProfile->location }}</p>
								<p><i class="fa fa-flag" aria-hidden="true"></i> {{ $theUser['country'] }} <i class="fa fa-bolt" aria-hidden="true"></i> {{ $theProfile['languages_spoken'] }}</p>
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
						<div class="col-12">
							<form action="/user/{{ $theUser->id }}" method="post">
							@csrf
							<button type="submit" class="btn btn-info">Seguir a este perfil</button>
							</form>
						</div>
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


@endsection
