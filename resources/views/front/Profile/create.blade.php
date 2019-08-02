@extends('front.template')

@section('pageTitle', 'Crear un Perfil')

@section('mainSection')
<h2>Formulario para crear un Perfil</h2>
{{-- Errores si los hubiera --}}
@if (count($errors))
  <ul>
    @foreach ($errors->all() as $error)
      <li class="text-danger"> {{ $error }} </li>
    @endforeach
  </ul>
@endif

<form action="/profile" method="post" enctype="multipart/form-data">
  @csrf
	<div class="row">
		<div class="col-6">
		  <div class="form-group">
			<label>Donde estás ahora?</label>
			<input
			  type="text"
			  name="location"
			  value="{{ $errors->has('location') ? null : old('location') }}"
			  class="form-control"
			>

			@if ($errors->has('location'))
			  <span class="text-danger">
				{{ $errors->first('location') }}
			  </span>
			@endif
		  </div>
		</div>

		<div class="col-6">
		  <div class="form-group">
			<label>Idiomas</label>
			<input
			  type="text"
			  name="languages_spoken"
			  value="{{ old('languages_spoken') }}"
			  class="form-control"
			>
			@if ($errors->has('languages_spoken'))
			  <span class="text-danger">
				{{ $errors->first('languages_spoken') }}
			  </span>
			@endif
		  </div>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
		  <div class="form-group">
			<label>Ciudades</label>
			<input
			  type="text"
			  name="visited_cities"
			  value="{{ old('visited_cities') }}"
			  class="form-control"
			>
			@if ($errors->has('visited_cities'))
			  <span class="text-danger">
				{{ $errors->first('visited_cities') }}
			  </span>
			@endif
		  </div>
		</div>
		<div class="col-6">
		  <div class="form-group">
			<label>Subí una imagen de fondo</label>
			<input type="file" name="cover_image" class="form-control">
			@if ($errors->has('cover_image'))
			  <span class="text-danger">
				{{ $errors->first('cover_image') }}
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
		  <button type="submit" class="btn btn-success">ENVIAR</button>
		</div>

</form>
@endsection
