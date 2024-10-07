<?php

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post("/auth/login" , function(Request $request){
    $validatedUser = $request->validate(
        [
            'password' =>'required|string',
            'email' => 'required|string|email',
    ]
    );



    $existingUser = User::where("email" , $validatedUser['email'])->first();


    if(!$existingUser){

        return response()->json([
            "message" => "User with the email doesent exist"
        ] , 400);
    }

    $correctPassword = Hash::check($validatedUser['password'] , $existingUser['password']);

    if(!$correctPassword){

        return response()->json([
            "message" => "Invalid Password"
        ] , 400);
    }

    $token = $existingUser->createToken($existingUser->email);



    return response()->json(
        [
            "user" => $existingUser,
            "token" => $token
        ]
    );
});

Route::get('/members' , function(){
    return response()->json(Member::all());
});
