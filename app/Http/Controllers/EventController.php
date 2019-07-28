<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $events = Event::paginate(5);
	  $totalEvents = count(Event::all());
	  
			return view('front/Events/index', compact('events', 'totalEvents'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('front.Events.create');
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
			'name' => 'required | max:15',
			'details' => 'required',
			'date' => 'required',
			'city' => 'required',
			'country' => 'required',
			//'user_id' => 'required',
			'image' => 'required | image'
		], [
			// input_name.rule => message
			'name.required' => 'El campo Titulo es obligatorio',
			'name.max' => 'El :attribute debe contener máximo 15 carácteres',
			'details.required' => 'El campo Detalles es obligatorio',
			'date.required' => 'El campo Fecha es obligatorio',
			'city.required' => 'El campo Ciudad es obligatorio',
			'country.required' => 'El campo País es obligatorio',
		]);
		// 2. Guardamos en DB
		// Event::create([
		// 	'name' => $request->input('name'),
		// 	'details' => $request->input('details'),
		// 	'date' => $request->input('date'),
		// 	'city' => $request->input('city'),
		// 	'country' => $request->input('country'),
		//	'user_id'=> $request->input('user_id'),
		// ]);
		// Guardo el evento en DB y dejo en una variable $event
		// $event = Event::create($request->except('_token'));
		$event = new Event; // Objeto de tipo Event Vacio
		// Asocio atributos con valores
		$event->neme = $request->input('name');
		$event->details = $request->input('details');
		$event->date = $request->input('date');
		$event->city = $request->input('city');
		$event->country = $request->input('country');
		//$event->user_id = $request->input('user_id');
		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$image = $request->file('image'); // El value del atributo name del input file
		if ($image) {
			// Armo un nombre único para este archivo
			$finalImage = uniqid("img_") . "." . $image->extension();
			// Subo el archivo en la carpeta elegida
			$image->storePubliclyAs("public/event-images", $finalImage);
			// Le asigno la imagen al evento que guardamos
			$event->image = $finalImage;
		}
		$event->save();
		// 3. Redireccionamos SIEMPRE a una RUTA
		return redirect('/events');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
	  $theEvent = Event::find($id);
			return view('front.Events.show', compact('theEvent'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      // Busco el Evento
		$eventToEdit = Event::find($id);
	
		return view('front.Events.edit', compact('eventToEdit'));
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
		$eventToUpdate = Event::find($id);
		
		$eventToUpdate->name = $request->input('name');
		$eventToUpdate->details = $request->input('details');
		$eventToUpdate->date = $request->input('date');
		$eventToUpdate->city = $request->input('city');
		$eventToUpdate->country = $request->input('country');
		// Obtengo el archivo que viene en el formulario (Objeto de Laravel) que tiene a su vez el archivo de la imagen
		$image = $request->file('image');
		if ($image) {
			// Armo un nombre único para este archivo.
			$finalImage = uniqid("img_") . "." . $image->extension();
			// Subo el archivo en la carpeta elegida
			$image->storePubliclyAs("public/event-images", $finalImage);
			// Le asigno la imagen a la película que guardamos
			$eventToUpdate->image = $finalImage;
		}
		$eventToUpdate->save();
		// Redireccionamos SIEMPRE a una RUTA
		return redirect('/events');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      // Busco el Evento
		$eventToDelete = Event::find($id);
		// La borro
		$eventToDelete->delete();
		// Redireccionamos SIEMPRE a una RUTA
		return redirect('/events');
  }
  
  public function search()
		{
			return view('front.events.search');
		}
		public function result(Request $request)
		{
			$events = Event::where('city', 'LIKE', '%' . $request->word . '%')->orWhere('country','LIKE','%' .$request->word . '%')->get();
			return view('front.events.result', compact('events'));
		}
  
  
  $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
}
