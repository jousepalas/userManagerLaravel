<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Register form
    public function create() {
return view('admin.register');
    }

    public function new(Request $request) {

        $formFields = $request->validate(([
            'name' => ['required'],
            'email' =>['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required']
        ]));
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);

        //auto login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged');
    }

    public function logout (Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User logged out');
    }


    public function login() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate(([
            'email' =>['required','email'],
            'password' => 'required'
        ]));

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'User logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
