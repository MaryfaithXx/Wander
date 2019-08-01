@extends('front.template')

@section('pageTitle', 'Crear un Post')

@section('mainSection')
<h2>Formulario para crear un Post</h2>
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
        <label>titulo del Post</label>
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
        <label>Post</label>
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
