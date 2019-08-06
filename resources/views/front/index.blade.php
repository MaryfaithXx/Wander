  @extends('front.template')

	@section('pageTitle', 'Wander - Conectando viajeros por el mundo')

	@section('mainSection')

		<!-- carousel -->
<div class="container-fluid">
	<div id="demo" class="carousel slide" data-ride="carousel">
	  <ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	  </ul>
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="/images/beach-group.jpg" alt="beach group">
		  <div class="carousel-caption">
			<h1>not all who wander are lost...</h1>
			<p> Wander es un creador de historias.
						<br>
						<br>
						Historias que conectan, que contagian, que se cuentan a través anécdotas de nuevas aventuras.
						<br>
						<br>
						Esta plataforma te ayudara a encontrar tu próximo destino, cuando y como disfrutarlo.Y a través de nuestra red social podrás recibir consejos, dar referencias y con “mi comunidad Wander” encontraras tu próximo compañero de aventuras.
						<br>
						<br>
						¡Pero la próxima historia la contas vos!</p>
		  </div>
		</div>
		<div class="carousel-item">
		  <img src="/images/aurora-borealis.jpg" alt="aurora">
		  <div class="carousel-caption">
			<h3>Encuentra eventos en tu próximo destino</h3>
			<p>Busca eventos por ciudad o país y agrégalos a tu itinerario</p>
		  </div>
		</div>
		<div class="carousel-item">
		  <img src="/images/carnaval-bahia.jpg" alt="carnaval">
		  <div class="carousel-caption">
			<h3>Conecta con otros viajeros</h3>
			<p>Crea un grupo de amigos previo a iniciar tu viaje</p>
		  </div>
		</div>
	  </div>
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>
	</div>
</div>
		<!-- /carousel -->

		<!-- search bar -->
		<section class="search-bar">
			<div class="container-fluid">
				<h3>Busqueda por destino</h3>
				<form class="search-form" action="/events/result/" method="get">
					<div class="row">
						<div class="col-12 col-md-4">
						  <input type="text" class="form-control" id="city" placeholder="Ciudad/País" name="word">
						</div>
						<div class="col-12 col-md-4">
						<button class="submit-button" type="submit"><i class="fas fa-search"></i> Buscar</button>
						</div>
					</div>
				</form>
			</div>
		</section>
		<!-- /search bar -->

		<!-- featured events -->
		<div class="container-fluid">
			<h3>Eventos destacados</h3>
			<section class="featured-events">
				<div class="row">
					<div class="col-12 col-md-6">
						<img class="tile-image" src="images/tomorrowland.jpg" alt="tomorrowland">
						<span class="tile-label">Tomorrowland</span>
					</div>
					<div class="col-6 col-md-3">
						<div class="row">
							<div class="col-12">
								<img class="tile-image" src="images/holi-festival.jpg" alt="holi festival">
								<span class="tile-label">Holi Festival</span>
							</div>
							<div class="col-12">
								<img class="tile-image" src="images/aurora-borealis.jpg" alt="aurora borealis">
								<span class="tile-label">Aurora Boreal</span>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<div class="row">
							<div class="col-12">
								<img class="tile-image" src="images/desert-group.jpg" alt="desert group">
								<span class="tile-label">Travesia por el desierto</span>
							</div>
							<div class="col-12">
								<img class="tile-image" src="images/great-barrier-reef.jpg" alt="great barrier reef">
								<span class="tile-label">Bucea en la Gran Barrera</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-md-3">
						<img class="tile-image" src="images/times-square-ball-drop.jpg" alt="times square ball drop">
						<span class="tile-label">Año nuevo en Nueva York</span>
					</div>
					<div class="col-6 col-md-3">
						<img class="tile-image" src="images/rock-in-rio.jpg" alt="rock in rio">
						<span class="tile-label">Rock in Rio</span>
					</div>
					<div class="col-6 col-md-3">
						<img class="tile-image" src="images/carnaval-bahia.jpg" alt="carnaval bahia">
						<span class="tile-label">Carnaval en Bahia</span>
					</div>
					<div class="col-6 col-md-3">
						<img class="tile-image" src="images/cannes-film-festival.jpg" alt="cannes film festival">
						<span class="tile-label">Festival de cine de Cannes</span>
					</div>
				</div>
			</section>
		</div>

<!-- Contenido dinámico de featured events-->
		<div class="row">
		@foreach ($featuredEvent as $event)
		<div class="col-6 col-md-3">
			<img class="tile-image" src="/storage/event-images/{{ $event['image'] }}" alt="{{ $event['name'] }}">
			<a style="display: inline-block;" href="/events/{{ $event->id }}" class="tile-label">{{ $event->name }}</a>
		</div>
		@endforeach
		</div>
		<!-- /featured events -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
