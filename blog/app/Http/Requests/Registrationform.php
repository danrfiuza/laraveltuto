<?php

namespace App\Http\Requests;

use App\Mail\WelcomeMail;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Mail;

class Registrationform extends FormRequest
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
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|confirmed',
        ];
    }

    public function persist()
    {
        //Create and saver the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        //sign them in
        auth()->login($user);
        Mail::to($user)->send(new WelcomeMail($user));
    }
}
