<?php

namespace App\Http\Controllers\Auth;

use App\User;

use App\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required'],
            'password' => ['required', 'string','confirmed', 'min:5', 'regex:/DH/'],
            'avatar' => ['required', 'image'],
          ],[
            'required' => 'El campo :attributes es obligatorio',
            'password.regex' => 'La contraseña debe contener las letras DH'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $request = request();
      $profileImage = $request->file('avatar');
      $profileImageName = uniqid('img-') . '.' . $profileImage->extension();
      $profileImage->storePubliclyAs("public/avatars", $profileImageName);

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'country' => $data['country'],
			      'state' => $data['state'],
            'password' => Hash::make($data['password']),
            'avatar' => $profileImageName
		]);

		Profile::create([
			'user_id' => $user->id,
			'location' => null,
			'visited_cities' => null,
			'languages_spoken' => null,
			'cover_image' => null,
        ]);

		return $user;
    }
}
