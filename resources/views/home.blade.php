  @extends('front.template')

	@section('pageTitle', 'Wander - Conectando viajeros por el mundo')

	@section('mainSection')

		<!-- carousel -->
		<div class="container-fluid">
			<section class="carousel">
				<br>
				<br>
				<br>
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
				<br>
				<br>
				<br
			</section>
		</div>
		<!-- /carousel -->

		<!-- search bar -->
		<section class="search-bar">
			<div class="container-fluid">
				<h3>Busqueda por destino</h3>
				<form class="search-form" action="#">
					<div class="row">
					  <div class="col-12 col-md-3">
						  <label for="destination">Destino:</label>
						  <br>
						  <input type="text" id="destination" placeholder="City/Country" name="destination">
					  </div>
					  <div class="col-12 col-md-3">
						  <label for="date">Desde:</label>
						  <br>
						  <input type="date" id="from-date" placeholder="dd/mm/yyyy" name="from-date">
					  </div>
					  <div class="col-12 col-md-3">
						<label for="date">Hasta:</label>
						<br>
						<input type="date" id="to-date" placeholder="dd/mm/yyyy" name="to-date">
					  </div>
					  <div class="col-12 col-md-3">
					  <br>
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

		<!-- /featured events -->

<div>
@foreach ($featuredEvent as $event)
<div class="col-6 col-md-3">
	<img class="tile-image" src="/storage/event-images/{{ $event['image'] }}" alt="tomorrowland">
	<a style="display: inline-block;" href="/events/{{ $event->name }}" class="tile-label">{{ $event->name }}</a>

</div>
@endforeach
@endsection
