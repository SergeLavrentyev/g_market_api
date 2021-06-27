<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt( $login )) {
            return response([ 'message' => 'Неверные данные пользователя' ]);
        }

        $user = auth()->user();

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);

    }

    public function register(Request $request)
    {
        $registerData = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $registerData['password'] = bcrypt($request->password);

        $user = User::create($registerData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'access_token' => $accessToken, 'user' => $user ]);
    }
}
