<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TodoController extends Controller
{
   public function index(Request $request)
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'))->with('title', "Todo List");
    }
    
    public function ajax(Request $request)
    {
        $todos = Todo::all();
        $html = view('todos.table', compact('todos'))->render();
    
        return response()->json(compact('html'));
    }

    public function store(Request $request)
    {
        Todo::updateOrCreate([
                    'id' => $request->product_id
                ],
                [
                    'title' => $request->title, 
                    'description' => $request->description
                ]);        
     
        return response()->json(['success'=>'Todo saved successfully.']);
    }
    
    public function edit($id)
    {
        $todo = Todo::find($id);
        return response()->json($todo);
    }
  
    public function destroy($id)
    {
        Todo::find($id)->delete();
        return redirect('/todo')->with('success','Todo deleted successfully!');
    }
}
