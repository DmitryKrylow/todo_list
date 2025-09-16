@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    <h1>Вход</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Пароль" class="form-control mb-2" required>
        <button type="submit" class="btn btn-success">Войти</button>
    </form>
    <p class="mt-2">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
