<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Контроллер авторизации
 * позволяет пользователям зайти в свой аккаунт
 * управлять своми данными
 * А также требуется для возможности работы с сервисом
 **/
class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }
    public function showLogin() {
        return view('auth.login');
    }

    /**
     * Метод для регистрации пользователей
     **/
    public function register(Request $request)
    {
        $response = app(AuthService::class)->register($request);
        return $response;
    }
    /**
     * Метод для авторизации пользователей
     **/
    public function login(Request $request)
    {
        $response = app(AuthService::class)->login($request);
        return $response;
    }
    /**
     * Метод выхода пользователя из системы
     **/
    public function logout(Request $request)
    {
        $response = app(AuthService::class)->logout($request);
        return $response;
    }
}
