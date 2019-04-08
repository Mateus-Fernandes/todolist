<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;


class TaskController extends Controller
{
    
    public function list($id)
    {
        $tasks = Task::where('todo_id', $id)->get(); // list all data from user
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        
        $task = Task::create($request->all());

        return response()->json([
            'message' => 'Success! New task created',
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {

        $task->update($request->all());

        return response()->json([
            'message' => 'Success! Task updated',
            'task' => $task
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Successfully deleted task!'
        ]);
    }
}
