<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{

	public function create()
	{

		return view('registration.register');

	}

	public function store(RegistrationRequest $registrationRequest)
	{
        // logic moved to registration request
		// validate form

//		$this->validate(request(), [
//
//			'name' => 'required',
//			'email' => 'required|email',
//			'password' => 'required|confirmed'
//
//		]);


		// create new user

//		$user = User::create(request(['name', 'email', 'password']));
//
//		// login user
//
//		auth()->login($user);
//
//		Mail::to($user)->send(new WelcomeAgain($user));

        $registrationRequest->persist();

		// redirect to home page



		return redirect('/');

	}    

}
