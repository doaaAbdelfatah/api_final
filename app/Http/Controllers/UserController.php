<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function register(Request $request){
        // $request->validate([

        // ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password=Hash::make($request->password);
        $user->role="user";
        $user->api_token = Str::random("100");
        $user->save(); 

        return $user;

    }  
    
    function login(Request $request){
      
        $credentials = $request->only('email', 'password' );

        if (Auth::attempt($credentials)) {
            // return Auth::user();   
            return ["token" => Auth::user()->createToken("test")->plainTextToken ];
        }else{
            return response()->json(["message" => "Invalid Email or Passowrd"] ,401);
        }      

    }

    function posts(Request $request){       
           return $request->user()->posts;
      }

    function user_posts(Request $request){
        
        $token =$request->header("user_token");
        $user = User::where("api_token" ,$token)->first();
        if ($user)
        {
            return $user->posts;
        }else{
            return response()->json(["message" => "Invalid User Token"] ,401);
        }

    }

    // function login_sanc (Request $request) {
       
    //     $user = User::where('email', $request->email)->first();
    
    //     if (! $user || ! Hash::check($request->password, $user->password)) {
    //         throw ValidationException::withMessages([
    //             'email' => ['The provided credentials are incorrect.'],
    //         ]);
    //     }
    
    //     return $user->createToken($request->device_name)->plainTextToken;
    // }
}
