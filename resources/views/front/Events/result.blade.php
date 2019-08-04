@extends('front.template')

@section('pageTitle', 'Resultado de Eventos')

@section('mainSection')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<ul>
			@forelse ($eventsResult as $event)
				<li>
					<em>{{ $event->name }} </em>
					<li><img src="/storage/event-images/{{ $event->image }}" style="width: 400px"></li>
					<a style="display: inline-block;" href="/events/{{ $event->name }}" class="btn btn-success">ver detalle</a>
				</li>
			@empty
				<br>
				<br>
				<h3>No se encontraron resultados para {{ $searchWord }} </h3>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
			@endforelse
			</ul>
		</div>
	</div>	
</div>					
@endsection
