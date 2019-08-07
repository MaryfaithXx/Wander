@extends('front.template')

@section('pageTitle', 'Crear un evento')

@section('mainSection')
<div class="container">
	<br>
	<br>
<h2>Crea un evento</h2>
<br>
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
				<label><h5>Nombre del Evento<h5/></label>
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
				<label><h5>Detalle del Evento<h5/></label>
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
	</div>
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label><h5>Fecha y Hora<h5/></label>
				<input
					type="datetime-local"
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
				<label><h5>Ciudad<h5/></label>
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
	</div>
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label><h5>País<h5/></label>
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
				<label><h5>Subí una imagen<h5/></label>
				<input type="file" name="image" class="form-control">
				@if ($errors->has('image'))
					<span class="text-danger">
						{{ $errors->first('image') }}
					</span>
				@endif
			</div>
		</div>
	</div>

	<div class="col-6" style="display:none;">
		<div class="form-group">
		<input type="text" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
		</div>
	</div>

	<div class="col-12">
		<button type="submit" class="btn-btn-success">ENVIAR</button>
	</div>

</form>
</div>
@endsection
