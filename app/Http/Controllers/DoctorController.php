<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Dotenv\Exception\ValidationException;
use PhpParser\Comment\Doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\Middleware\RateLimited;

class DoctorController extends Controller
{
    // show all doctors
    public function index(){
        return view('Doctor.doctors-index');
    }
    // register form
    public function register(){
        return view('Doctor.doctor-register');
    }
    // create new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:doctors,email|email',
            'department' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $formFields = [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'password' => Hash::make($request->password),
        ];
        // if($request->get('guard') === 'doctor')
        // {
        //     $user = Doctor::create($formFields);
        //     // //login
        //     // auth()->login($user);
        //     event(new Registered($user));
        //     Auth::login($user);
        // return redirect('/')->with('message', 'Doctor created and logged in ');
        // }

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);
        $request->get('guard') === 'doctor' ;
        $user = Doctor::create($formFields);
        //login
            auth()->login($user);
            // event(new Registered($user));
            // Auth::login($user);
        
        return redirect('/')->with('message', 'Doctor created and logged in ');
        
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
        return view('Doctor.login-doctor');
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
