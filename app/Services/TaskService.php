<?php
namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TaskService
{
    public function addTask(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $request->user()->tasks()->create($validated);

        return redirect()->route('tasks.index');
    }
    public function deleteTask(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
        $task->delete();
        return redirect()->route('tasks.index');
    }

}
