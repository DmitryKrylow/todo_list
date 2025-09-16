<?php

namespace App\Http\Controllers;


use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller{
    public function deleteTask(Task $task){
        $response = app(TaskService::class)->deleteTask($task);
        return $response;
    }
    public function addTask(Request $request){
        $response = app(TaskService::class)->addTask($request);
        return $response;
    }

    public function index(Request $request) {
        $tasks = $request->user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }
}
