<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginUser(Request $request){
        // Membuat Rules Untuk validasi
         $rules = [
            "email"=> "required|email",
            "password"=> "required",
        ];

        // Validasi nilai input
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return response()->json([
                "status"=> false,
                "message"=> "Login Process Failed",
                'data' => $validator->errors()->first(),
            ],422); 
        }

        // Validasi Email dan Password
        if(!Auth::attempt($request->only(['email','password']))) {
            return response()->json([
                'status'=> false,
                'message'=> 'Email and Password not Valid'
            ],401);
        }

        // Request User
        $user = User::where('email', $request->email)->first();
        // Membuat Token
        $token = $user ->createToken('user_token')->plainTextToken;

        // Responses
        return response()->json([
            'status'=> true,
            'message' => "Login Succesfully",
            'user' => $user,
            'token'=> $token,
        ],200);
    }
}
