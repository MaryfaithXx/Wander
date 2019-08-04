@extends('front.template')

@section('pageTitle', 'Posts')

@section('mainSection')
<div class="container">
	<br>
	<br>
	<h2>Formulario para editar un Post  {{ $postToEdit->title}}</h2>
	<br>
	{{-- Errores si los hubiera --}}
	@if (count($errors))
		<ul>
			@foreach ($errors->all() as $error)
				<li class="text-danger"> {{ $error }} </li>
			@endforeach
		</ul>
	@endif

	<form action="/posts/{{ $postToEdit->id }}" method="post" enctype="multipart/form-data">
		@csrf
		{{ method_field('put') }}
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label><h5>Titulo del Post<h5/></label>
					<input
						type="text"
						name="title"
						value="{{ old('title', $postToEdit->title) }}"
						class="form-control"
					>

					@if($errors->has('title'))
						<span class="text-danger">
							{{ $errors->first('title') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-6">
				<div class="form-group">
					<label><h5>Post<h5/></label>
					<input
						type="text"
						name="details"
						value="{{ old('details', $postToEdit->details) }}"
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
					<label><h5>Subí una imagen<h5/></label>
					<input type="file" name="image" class="form-control">
					@if ($errors->has('image'))
						<span class="text-danger">
							{{ $errors->first('image') }}
						</span>
					@endif
				</div>
			</div>

			<div class="col-12">
				<button type="submit" class="btn-btn-success">ENVIAR</button>
			</div>
		</div>
	</form>
</div>
@endsection
