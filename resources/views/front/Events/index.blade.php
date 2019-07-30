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
				<div class="container mt-5 mb-5">
					<div class="row">
						<div class="col-md-3">
						<li><img src="/storage/event-images/{{ $event['image'] }}" style="width: 200px"></li>
						</div>
						<div class="col-md-6">
							<ul class="timeline">
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
									<a href="/events/{{ $event->id }}/edit" class="btn btn-info">Editar Evento</a>
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
	{{-- Imprimo la paginacion --}}
	{{ $events->links() }}
	
@endsection