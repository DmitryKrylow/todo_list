<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;
class  AuthService
{
    public function register(Request $request)
    {

        $request->validate([
            'name'     => 'required|string|min:2|max:256',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|regex:/^\S+$/',
        ]);


        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('tasks.index');
    }
    public function login(Request $request)
    {

        $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string|min:8|regex:/^\S+$/',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('tasks.index');
        }

        return back()->withErrors(['email' => 'Неверный логин или пароль']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function user(Request $request) {
        $user = $request->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
    public function users(Request $request)
    {
        return response()->json([
            'users' => User::all()
        ]);
    }
}
