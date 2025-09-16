@extends('layouts.app')

@section('title', 'Мои задачи')

@section('content')
    <h1>Мои задачи</h1>

    <form method="POST" action="{{ route('tasks.store') }}" class="mb-3">
        @csrf
        <input type="text" name="title" placeholder="Название задачи" class="form-control mb-2" required>
        <textarea name="description" placeholder="Описание" class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

    <ul class="list-group">
        @forelse($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $task->title }}</strong>
                    <p class="mb-0">{{ $task->description }}</p>
                </div>
                <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Удалить</button>
                </form>
            </li>
        @empty
            <li class="list-group-item">Задач пока нет</li>
        @endforelse
    </ul>
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
