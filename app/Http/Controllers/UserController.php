<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // register form
    public function register(){
        return view('users.register');
    }

    // create new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email|email',
            'department' =>'required',
            'password' => 'required|confirmed|min:6',
            'type' => '',
        ]);

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        //login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in ');
        
    }

    // logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You Have Been logged out!');
    }

    // login 
    public function login(){
        return view('users.login');
    }

    // authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You are logged in !');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
