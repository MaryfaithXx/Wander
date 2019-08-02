<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = Post::all();
		return view('front.Post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('front.Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Validamos
		$request->validate([
			// input_name => rules,
			'title' => 'required | max:15',
			'details' => 'required',
			'user_id' => 'required',
			'image' => 'required | image'
		], [
			// input_name.rule => message
			'title.required' => 'El campo Titulo es obligatorio',
			'title.max' => 'El :attribute debe contener máximo 15 carácteres',
			'details.required' => 'El campo Detalles es obligatorio'
		]);
		// 2. Guardamos en DB
		$post = new Post; // Objeto de tipo Post Vacio
		// Asocio atributos con valores
		$post->title = $request->input('title');
		$post->details = $request->input('details');
		$post->user_id = $request->input('user_id');
		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$image = $request->file('image'); // El value del atributo name del input file
		if ($image) {
			// Armo un nombre único para este archivo
			$finalImage = uniqid("img_") . "." . $image->extension();
			// Subo el archivo en la carpeta elegida
			$image->storePubliclyAs("public/post-images", $finalImage);
			// Le asigno la imagen al evento que guardamos
			$post->image = $finalImage;
		}
		$post->save();
		// 3. Redireccionamos SIEMPRE a una RUTA
		return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thePost = Post::find($id);
			return view('front.Post.show', compact('thePost'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Busco el Post
		$postToEdit = Post::find($id);

		return view('front.Post.edit', compact('postToEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $postToUpdate = Post::find($id);

		$postToUpdate->title = $request->input('title');
		$postToUpdate->details = $request->input('details');
		$postToUpdate->user_id = $request->input('user_id');
		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$image = $request->file('image');
		if ($image) {
			// Armo un nombre único para este archivo.
			$finalImage = uniqid("img_") . "." . $image->extension();
			// Subo el archivo en la carpeta elegida
			$image->storePubliclyAs("public/event-images", $finalImage);
			// Le asigno la imagen al post que guardamos
			$postToUpdate->image = $finalImage;
		}
		$postToUpdate->save();
		// Redireccionamos SIEMPRE a una RUTA
		return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Busco el Post
		$postToDelete = Post::find($id);
		// Lo borro
		$postToDelete->delete();
		// Redireccionamos SIEMPRE a una RUTA
		return redirect('/posts');
    }

    public function search()
		{
			return view('front.Post.search');
		}
		public function result(Request $request)
		{
			$posts = Post::where('user_id', 'LIKE', '%' . $request->word . '%')->get();
			return view('front.Post.result', compact('posts'));
		}

}
