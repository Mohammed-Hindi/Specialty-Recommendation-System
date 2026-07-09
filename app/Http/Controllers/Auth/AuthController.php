<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        //validate
        $validate = $request->validated();
        
        //Create user logic here
        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'role' => 'student',
        ]);

        //Generate token for the user
        $token = $user->createToken('auth-token')->plainTextToken;
        
        // Return the user data and token
        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token,
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        //validate
        $validate = $request->validated();
        
        //Find user by email
        $user = User::where('email', $validate['email'])->first();
        
        //Check if user exists and password is correct
        if (!$user || !Hash::check($validate['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
        
        //Generate token for the user
        $token = $user->createToken('auth-token')->plainTextToken;
        
        //Return the user and token
        return response()->json([
            'message' => 'User logged in successfully',
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        //Delete the token
        $request->user()->currentAccessToken()->delete();
        
        //Return success message
        return response()->json([
            'message' => 'User logged out successfully',
        ], 200);
    }
}
