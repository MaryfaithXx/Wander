@extends('front.template')

@section('pageTitle', 'Wander - Mi Perfil')

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
							<img src="/storage/avatars/{{Auth::user()->avatar}}" alt="imagen usuario" class="avatarUser">
						</div>
						<div class="info">
							<h3> {{Auth::user()->name}} </h3>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i> ¿Dónde estás ahora? -   <i class="fa fa-globe"></i> País de Residencia</p>
							<p><i class="fa fa-flag" aria-hidden="true"></i> {{Auth::user()->country}} <i class="fa fa-bolt" aria-hidden="true"></i>      Idiomas</p>
							<a href="/profile/create" class="modal-link"> Crear Perfil </a>
							<a href="/profile/{{Auth::user()->id}}/edit" class="modal-link"> Editar Perfil </a>
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

	<!-- Posteos -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-8">
				<h2 class="tituloPosts">Posts</h2>

				<div class="col-12">
					<div class="col-2">
						<a id="login-button" href="{{ redirect('/post/create') }}">Crea tu Posteo</a>
					</div>
				</div>
				<ul class="timeline">
				@foreach ($posts as $post)
					<div class="container mt-5 mb-5">
						<div class="row">
							<div class="col-md-6 offset-md-3">
								<ul class="timeline">
									<li><img src="/storage/post-images/{{ $post['image'] }}" style="width: 200px"></li>
									<h4><strong><a target="_blank" href="#">{{ $post ['title'] }}</a></strong></h4>
									<br>
									<li> {{ $post['details'] }} </li>
									<br>
									<div class="col-12">
										<form action="/post/{{ $post->id }}" method="post">
										@csrf
										{{ method_field('delete') }}
										<a href="/post/{{ $post->id }}/edit" class="btn btn-info">Editar Posteo</a>
										<button type="submit" class="btn btn-danger">Borrar</button>
										</form>
									</div>
								</ul>
							</div>
						</div>
					</div>
				@endforeach
				</ul>
			</div>
			<!--/Posteos-->

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
