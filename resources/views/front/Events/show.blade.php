@extends('front.template')

@section('pageTitle', 'Detalle del Evento ' . $theEvent['name'])

@section('mainSection')

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<ul class="timeline">
				<li><img src="/storage/event-images/{{ $theEvent['image'] }}" style="width: 400px"></li>
				<h4><strong><a target="_blank" href="#">{{ $theEvent['name'] }}</a></strong></h4>
				<li> {{ $theEvent['city'] }} - {{ $theEvent['country'] }} 
				<span class="float-right">{{ $theEvent['date'] }}</span></li>
				<br>
				<li> {{ $theEvent['details'] }} </li>
				<br>
				<div class="col-12">
					<form action="/events/{{ $theEvent->id }}" method="post">
					@csrf
					{{ method_field('delete') }}
					<a href="/events/{{ $theEvent->id }}/edit" class="btn btn-info">Editar Evento</a>
					<button type="submit" class="btn btn-danger">Borrar</button>
					</form>
				</div>
			</ul>
		</div>
	</div>	
</div>					
@endsection
