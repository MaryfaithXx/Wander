<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;

use App\Post;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('front.profile', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.Profile.create');
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
			'cover_image' => 'image'
		], [
			// input_name.rule => message
			'cover_image.image' => 'Formato de imagen invalido',
		]);
		// 2. Guardamos en DB
		$profile = new Profile; // Objeto de tipo Profile Vacio
		// Asocio atributos con valores
		$profile->location = $request->input('location');
		$profile->languages_spoken = $request->input('languages_spoken');
		$profile->visited_cities = $request->input('visited_cities');
		$profile->user_id = $request->input('user_id');
		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$cover_image = $request->file('cover_image'); // El value del atributo name del input file
		if ($cover_image) {
			// Armo un nombre único para este archivo
			$finalCoverImage = uniqid("img_") . "." . $cover_image->extension();
			// Subo el archivo en la carpeta elegida
			$cover_image->storePubliclyAs("public/cover-images", $finalCoverImage);
			// Le asigno la imagen al evento que guardamos
			$profile->cover_image = $finalCoverImage;
		}
		$profile->save();
		// 3. Redireccionamos SIEMPRE a una RUTA
		return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $theProfile = Profile::find($id);
		return view('front.Profile.show', compact('theProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Busco el Profile
		$profileToEdit = Profile::find($id);

		return view('front.Profile.edit', compact('profileToEdit'));
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
        $profileToUpdate = Profile::find($id);

		$profileToUpdate->location = $request->input('location');
		$profileToUpdate->visited_cities = $request->input('visited_cities');
		$profileToUpdate->languages_spoken = $request->input('languages_spoken');
		$profileToUpdate->user_id = $request->input('user_id');
		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$cover_image = $request->file('cover_image');
		if ($cover_image) {
			// Armo un nombre único para este archivo.
			$finalCoverImage = uniqid("img_") . "." . $cover_image->extension();
			// Subo el archivo en la carpeta elegida
			$cover_image->storePubliclyAs("public/cover-images", $finalCoverImage);
			// Le asigno la imagen al perfil que guardamos
			$profileToUpdate->cover_image = $finalCoverImage;
		}
		$profileToUpdate->save();
		// Redireccionamos SIEMPRE a una RUTA
		return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Busco el Perfil
		$profileToDelete = Profile::find($id);
		// Lo borro
		$profileToDelete->delete();
		// Redireccionamos SIEMPRE a una RUTA
		return redirect('/profile');
    }
	
	public function search()
		{
			return view('front.Profile.search');
		}
		public function result(Request $request)
		{
			$profiles = Profile::where('user_id', 'LIKE', '%' . $request->word . '%')->get();
			return view('front.Profile.result', compact('profiles'));
		}
		
}
