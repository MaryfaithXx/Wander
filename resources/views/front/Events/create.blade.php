@extends('front.template')

@section('pageTitle', 'Crear un evento')

@section('mainSection')
	<h2>Formulario para crear un evento</h2>
	{{-- Errores si los hubiera --}}
	@if (count($errors))
		<ul>
			@foreach ($errors->all() as $error)
				<li class="text-danger"> {{ $error }} </li>
			@endforeach
		</ul>
	@endif

	<form action="/events" method="post" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label>Nombre del Evento</label>
					<input
						type="text"
						name="name"
						value="{{ $errors->has('name') ? null : old('name') }}"
						class="form-control"
					>

					@if ($errors->has('name'))
						<span class="text-danger">
							{{ $errors->first('name') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Detalle del Evento</label>
					<input
						type="text"
						name="details"
						value="{{ old('details') }}"
						class="form-control"
					>
					@if ($errors->has('details'))
						<span class="text-danger">
							{{ $errors->first('details') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Fecha y Hora</label>
					<input
						type="dateTime"
						name="date"
						value="{{ old('date') }}"
						class="form-control"
					>
					@if ($errors->has('date'))
						<span class="text-danger">
							{{ $errors->first('date') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Ciudad</label>
					<input
						type="text"
						name="city"
						value="{{ old('city') }}"
						class="form-control"
					>
					@if ($errors->has('city'))
						<span class="text-danger">
							{{ $errors->first('city') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>País</label>
					<input
						type="text"
						name="country"
						value="{{ old('country') }}"
						class="form-control"
					>
					@if ($errors->has('country'))
						<span class="text-danger">
							{{ $errors->first('country') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label>Subí una imagen</label>
					<input type="file" name="image" class="form-control">
					@if ($errors->has('image'))
						<span class="text-danger">
							{{ $errors->first('image') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-12">
				<button type="submit" class="btn btn-success">ENVIAR</button>
			</div>
		</div>
	</form>

@endsection