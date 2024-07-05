<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    public function signUp(SignupRequest $request){

       $newUser = $request->all();
       $user = User::create($newUser);

       return response()->json([
        'access_token'=>$user->createToken('api-token')->plainTextToken
       ]);



    }


    public function login(loginRequest $request){

        $user = User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password,$user->password)){
        }

         return response()->json([
           'user'=>$user,
           'access_token'=>$user->createToken('api-token')->plainTextToken,

         ]);
    }
}
