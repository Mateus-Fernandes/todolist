<?php

namespace App\Http\Controllers\Todo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Todo;
use Auth;

class TodoController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $todo = Todo::where('user_id', $userId)->get(); // list all data from user
        return view('Todo.index', compact('todo'));
    }

    public function about(){
        return view('About.index');
    }    

    public function add(){
        return view('Todo.add');
    }
    public function edit($id){
        $todo = Todo::findOrFail($id);
        return view('Todo.edit', compact('todo'));
    }

    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return redirect()->route('todo.edit', $todo->id)->with('alert-success','Todo has been deleted!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todo.index')->with('alert-success','Todo has been deleted!');
    }
}
