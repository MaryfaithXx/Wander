@extends('front.template')

@section('pageTitle', 'Detalle del Evento ' . $theEvent['name'])	

@section('mainSection')

<div class="item">
	<span> {{ $theEvent['date'] }}</span>
	<div class="content">
		<img src="/storage/event-images/{{ $theEvent['image'] }}" style="width: 200px">
		<h3>{{ $theEvent['name'] }} </h3>
		<li> {{ $theEvent['city'] }} - {{ $theEvent['country'] }} </li>
		<li> {{ $theEvent['details'] }} </li>
		<div class="col-12">
			<form action="/events/{{ $theEvent->id }}" method="post">
			@csrf
			{{ method_field('delete') }}
			<a href="/events/{{ $theEvent->id }}/edit" class="btn btn-info">Editar Evento</a>
			<button type="submit" class="btn btn-danger">BORRAR</button>
			</form>
		</div>
	</div>
	<br>
	<br>
</div>

@endsection