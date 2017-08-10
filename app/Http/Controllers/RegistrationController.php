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
        $registrationRequest->persist();

        request()->session()->flash('message', 'Successfully registered!');

		return redirect('/');
	}    

}
