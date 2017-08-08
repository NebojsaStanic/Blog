<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{

	public function create()
	{

		return view('registration.register');

	}

	public function store() 
	{

		// validate form

		$this->validate(request(), [

			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed'

		]);


		// create new user

		$user = User::create(request(['name', 'email', 'password']));

		// login user

		auth()->login($user);

		// redirect to home page

		return redirect('/');

	}    

}
