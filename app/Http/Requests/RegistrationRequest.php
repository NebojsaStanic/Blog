<?php

namespace App\Http\Requests;

use App\Mail\WelcomeAgain;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Support\Facades\Mail;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {
        $user = User::create($this->only(['name', 'email', 'password']));

        // login user

        auth()->login($user);

        Mail::to($user)->send(new WelcomeAgain($user));
    }
}
