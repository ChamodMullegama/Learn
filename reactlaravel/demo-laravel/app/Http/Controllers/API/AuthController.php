<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $validatedRequest = $request->validate([
            'fname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        try {

            $user = User::create([
                'name'=>$validatedRequest['fname'],
                'email'=>$validatedRequest['email'],
                'password'=>Hash::make($validatedRequest['password'])
            ]);

            return response()->json([
                'success'=>true,
                'message'=>'User registered successfully',
                'data'=>$user
            ],201);

        } catch (Exception $e) {
            return response()->json([
                'success'=>false,
                'message'=>'Registration failed: '.$e->getMessage(),
                'error'=>$e->getMessage()
            ],500);
        }
    }
}
