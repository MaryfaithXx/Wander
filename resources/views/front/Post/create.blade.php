@extends('front.template')

@section('pageTitle', 'Crear un Post')

@section('mainSection')
<div class="container">
<br>
<br>
<h2>Crea un Post</h2>
<br>
{{-- Errores si los hubiera --}}
@if (count($errors))
  <ul>
    @foreach ($errors->all() as $error)
      <li class="text-danger"> {{ $error }} </li>
    @endforeach
  </ul>
@endif

<form action="/posts" method="post" enctype="multipart/form-data">
  @csrf
	<div class="row">
		<div class="col-6">
		  <div class="form-group">
			<label><h5>titulo del Post<h5/></label>
			<input
			  type="text"
			  name="title"
			  value="{{ $errors->has('title') ? null : old('title') }}"
			  class="form-control"
			>

			@if ($errors->has('title'))
			  <span class="text-danger">
				{{ $errors->first('title') }}
			  </span>
			@endif
		  </div>
		</div>

		<div class="col-6">
		  <div class="form-group">
			<label><h5>Detalle del Post<h5/></label>
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
			<label><h5>Subí una imagen<h5/></label>
			<input type="file" name="image" class="form-control">
			@if ($errors->has('image'))
			  <span class="text-danger">
				{{ $errors->first('image') }}
			  </span>
			@endif
		  </div>
		</div>

		<div class="col-6" style="display:none;">
		  <div class="form-group">
			<input type="text" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
		  </div>
		</div>
	</div>

		<div class="col-12">
		  <button type="submit" class="btn-btn-success">ENVIAR</button>
		</div>

</form>
</div>
@endsection
