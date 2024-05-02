<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|in:admin,user,support',
            'password' => 'required|string',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        if ($user->save()) {
            $tokenResult = $user->createToken("Personal Access Token");
            $token = $tokenResult->plainTextToken;

            return response()->json([
                'status' => 'Success',
                'message' => 'Successfully registered',
                'token_type' => 'bearer',
                'token' => $token
            ]);
        }

        throw new Exception("Failed to register. Please double check your details.", Response::HTTP_BAD_REQUEST);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember_me' => 'boolean'
        ]);

        $credentials = $request->only('email', 'password');
        $rememberMe = $request->remember_me ?? false;

        if (!Auth::attempt($credentials, $rememberMe)) {
            return response()->json([
                'status' => 'Unauthorize',
                'message' => 'Invalid email or password'
            ]);
        }

        $user = $request->user();
        $tokenResult = $user->createToken("Personal Access Token");
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully registered',
            'token_type' => 'bearer',
            'token' => $token
        ]);
    }
}
