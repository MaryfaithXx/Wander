<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-8">
			<h2 class="tituloPosts">Posts</h2>

			<div class="col-12">
				<div class="col-2">
					<a id="login-button" href="{{ redirect('/post/create') }}">Crea tu Posteo</a>
				</div>
			</div>
			<ul class="timeline">
			@foreach ($posts as $post)
				<div class="container mt-5 mb-5">
					<div class="row">
						<div class="col-md-6 offset-md-3">
							<ul class="timeline">
								<li><img src="/storage/post-images/{{ $post['image'] }}" style="width: 200px"></li>
								<h4><strong><a target="_blank" href="#">{{ $post ['title'] }}</a></strong></h4>
								<br>
								<li> {{ $post['details'] }} </li>
								<br>
								<div class="col-12">
									<form action="/post/{{ $post->id }}" method="post">
									@csrf
									{{ method_field('delete') }}
									<a href="/post/{{ $post->id }}/edit" class="btn btn-info">Editar Posteo</a>
									<button type="submit" class="btn btn-danger">Borrar</button>
									</form>
								</div>
							</ul>
						</div>
					</div>
				</div>
			@endforeach
			</ul>
		</div>
