@extends('front.template')

@section('pageTitle', 'Eventos')

@section('mainSection')

<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-12">
			<h2 class="tituloEventos">Eventos</h2>
			
			<div class="col-12">
				<div class="col-2">
					<a id="login-button" href="{{ redirect('/events/create') }}">Crea tu Evento</a>
				</div>
			</div>
			<ul class="timeline">
			@foreach ($events as $event)
				<div class="item">
					<span> {{ $event['date'] }}</span>
					<div class="content">
						<img src="/storage/event-images/{{ $event['image'] }}" style="width: 200px">
						<h3>{{ $event['name'] }} </h3>
						<li> {{ $event['city'] }} - {{ $event['country'] }} </li>
						<li> {{ $event['details'] }} </li>
						<div class="col-12">
							<form action="/events/{{ $event->id }}" method="post">
							@csrf
							{{ method_field('delete') }}
							<a href="/events/{{ $event->id }}/edit" class="btn btn-info">Editar Evento</a>
							<button type="submit" class="btn btn-danger">BORRAR</button>
							</form>
						</div>
					</div>
					<br>
					<br>
				</div>
			@endforeach
			</ul>
		</div>	
	{{-- Imprimo la paginación --}}
	{{ $events->links() }}
	
@endsection