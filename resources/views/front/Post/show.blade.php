@extends('front.template')

@section('pageTitle', 'Post ' . $thePost['title'])

@section('mainSection')

<div class="item">
	<span> {{ $thePost['date'] }}</span>
	<div class="content">
		<img src="/storage/post-images/{{ $thePost['image'] }}" style="width: 200px">
		<h3>{{ $thePost['title'] }} </h3>
		<p> {{ $thePost['details'] }} </p>
		<div class="col-12">
			<form action="/posts/{{ $thePost->id }}" method="post">
			@csrf
			{{ method_field('delete') }}
			<a href="/posts/{{ $thePost->id }}/edit" class="btn btn-info">Editar Post</a>
			<button type="submit" class="btn btn-danger">BORRAR</button>
			</form>
		</div>
	</div>
	<br>
	<br>
</div>

@endsection
