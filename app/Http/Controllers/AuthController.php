<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function render_login_page(){

        return view('auth.login');
    }

    public function render_signup_page(){
        return view('auth.signup');
    }

    public function signup(Request $request){

        $validatedUser = $request->validate(
            [

                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'password' =>'required|string',
                'email' => 'required|string|email',
                'phone_number' => 'required|string',
                'id_number' => 'required|string',
            ]
            );

            $existingUser = User::where('email', $validatedUser['email'])->first();

            if($existingUser){
               return redirect()->back()->with("email_exists" , "User with that email already exists");
            }

            User::create([
                'first_name' => $validatedUser['first_name'],
                'last_name' => $validatedUser['last_name'],
                'email' => $validatedUser['email'],
                'phone_number' => $validatedUser['phone_number'],
                'id_number' => $validatedUser['id_number'],
                'password' => Hash::make($validatedUser['password'])
            ]);
        return redirect("/auth/login");
    }


    public function login(Request $request){
        // dd($request->all());
        $validatedUser = $request->validate(
            [
                'password' =>'required|string',
                'email' => 'required|string|email',
        ]
        );

        $existingUser = User::where("email" , $validatedUser['email'])->first();

        if(!$existingUser){

            return redirect()->back()->with('invalid_email' , "invalid email");
        }

        $correctPassword = Hash::check($validatedUser['password'] , $existingUser['password']);

        if(!$correctPassword){
            return redirect()->back()->with('invalid_password' , "invalid password");
        }

        Auth::attempt($validatedUser);

        return redirect("/admin");


    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/auth/login");
    }
}
