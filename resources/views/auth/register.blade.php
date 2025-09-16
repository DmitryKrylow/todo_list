@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <h1>Регистрация</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Имя" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Пароль" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
    <p class="mt-2">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
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
