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
						<img src="/storage/cover-images/{{Auth::user()->profiles->cover_image}}" class="coverImage">
					</div>
					<div class="user">
						<div class="avatar">
							<img src="/storage/avatars/{{Auth::user()->avatar}}" alt="imagen usuario" class="avatarUser">
						</div>
						<div class="info">
							<h3> {{Auth::user()->name}} </h3>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i> ¿Dónde estás ahora? {{ Auth::user()->profiles->location }}</p>
							<p><i class="fa fa-flag" aria-hidden="true"></i> País de Residencia {{ Auth::user()->country }} </p>
							<p><i class="fa fa-bolt" aria-hidden="true"></i> Idiomas {{ Auth::user()->profiles->languages_spoken }}</p>
							@if (Auth::user()->profiles)
								<span class="fas fa-user-edit"></span>
								<a href="/profile/{{Auth::user()->id}}/edit" class="modal-link"> Editar Perfil </a>
							@else
								<span class="fas fa-user-edit"></span>
								<a href="/profile/create" class="modal-link"> Crear Perfil </a>
							@endif
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
							<a href="{{ route('connections') }}">
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

				<div class="col-12">
					<div class="col-8">
						<a id="login-button" href="{{ route('createPost') }}">Crea tu Posteo</a>
					</div>
				</div>

				<div class="col-12">
					<div class="col-8">
						<a id="login-button" href="{{ route('createEvent') }}">Crea tu Evento</a>
					</div>
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
			<div class="col-12 col-md-6">
				<h2 class="postTitle">Posts</h2>

				<ul class="timeline">
				@foreach ($posts as $post)
					@if ($post['user_id'] == Auth::user()->id)
					<div class="container mt-5 mb-5">
						<div class="row">
							<div class="col-md-6">
								<ul class="timeline">
									<li><img src="/storage/post-images/{{ $post['image'] }}" style="width: 200px"></li>
									<h4><strong><a target="_blank" href="#">{{ $post ['title'] }}</a></strong></h4>
									<br>
									<li> {{ $post['details'] }} </li>
									<br>
									<div class="col-12">
										<form action="/posts/{{ $post->id }}" method="post">
										@csrf
										{{ method_field('delete') }}
										<a href="/posts/{{ $post->id }}/edit"><i class="fas fa-pen-square" style="font-size:3em"></i></a>
										<button type="submit" class="delete-icon"><i class="fas fa-trash" style="font-size:2.6em"></i></button>
										</form>
									</div>
								</ul>
							</div>
						</div>
					</div>
					@endif
				@endforeach
				</ul>
			</div>
			<!--/Posteos-->

			<!-- Eventos-->

					<div class="col-12 col-md-6">
						<h2 class="postTitle">Eventos</h2>
						<ul class="timeline">
						@foreach (Auth::user()->events as $event)
								<div class="container mt-5 mb-5">
									<div class="row">
										<div class="col-md-6">
											<ul class="timeline">
												<li><img src="/storage/event-images/{{ $event['image'] }}" style="width: 200px"></li>
												<h4><strong><a target="_blank" href="#">{{ $event['name'] }}</a></strong></h4>
												<li> {{ $event['city'] }} - {{ $event['country'] }}
												<span class="float-right">{{ $event['date'] }}</span></li>
												<br>
												<li> {{ $event['details'] }} </li>
												<br>
												<div class="col-12">
													<form action="/events/{{ $event->id }}" method="post">
													@csrf
													{{ method_field('delete') }}
													<a href="/events/{{ $event->id }}/edit"><i class="fas fa-pen-square" style="font-size:3em"></i></a>
													<button type="submit" class="delete-icon"><i class="fas fa-trash" style="font-size:2.6em"></i></button>
													</form>
												</div>
											</ul>
										</div>
									</div>
								</div>
						@endforeach
						</ul>
					</div>

			<!--/Eventos-->

		</div>
	</div>

@endsection
