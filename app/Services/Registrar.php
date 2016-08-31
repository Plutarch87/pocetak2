<?php namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

    public $user;
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        $user = User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'img' => 'storage/images/default.png',
            'role' => $data['role'],
            'email' => $data['email']
        ]);

        $user->roles()->attach($data['role']);

        Mail::send('emails.register', ['data' => $data], function ($m) use ($data)
        {
            $email = $data['email'];
            $name = $data['name'];
            $m->from('andrej.hohnjec@planetsg.com', 'Tournament Scheduler');

            $m->to($email, $name)->subject('Confirm Registration');
        });

        return $user;
    }

}
