<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ApiRegisterRequest;;
use App\Http\Requests\ApiLoginRequest;;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    public function register(ApiRegisterRequest $request) {
        $user = new User();
        $user->fill($request->input());
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user);
    }

    public function login(ApiLoginRequest $request) {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('App')->plainTextToken;
            $user->token = $token;
            return response()->json($user);
        }
        return response()->json(['mesage'=> 'Sai email hoac mat khau'],401);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return response()->json(['mesage'=> 'Logged out'],200);
    }

    public function userInfo(Request $request) {
        return response()->json($request->user('sanctum'));
    }
}
