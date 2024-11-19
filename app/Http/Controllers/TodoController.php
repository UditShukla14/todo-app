<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index'); // Return the view that contains both Livewire components
    }

    public function form($todo_id = null)
    {
        return view('todo.form',['todo_id' => $todo_id]); // Return the view that contains both Livewire components
    }

    public function table()
    {
        return view('todo.table'); // Return the view that contains both Livewire components
    }

   
}
