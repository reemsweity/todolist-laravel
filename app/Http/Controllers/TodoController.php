<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
   
    public function index()
    {
        $todos = auth()->user()->todos;
    return view('todos.index', compact('todos'));
    }

    
    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        auth()->user()->todos()->create($request->all());

        return redirect()->route('todos.index');
    

        
    }

    
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    // Show form to edit a to-do
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    // Update a specific to-do
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = auth()->user()->todos()->findOrFail($id);
        $todo->update($request->all());

        return redirect()->route('todos.index');
    }

    // Delete a specific to-do
    public function destroy($id)
    {
        $todo = auth()->user()->todos()->findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index');
    }
    public function adminDashboard()
{
    $todos = Todo::all(); // Fetch all to-dos
    $completedTodos = Todo::where('status', 'completed')->count(); // Count completed to-dos
    $pendingTodos = Todo::where('status', 'pending')->count(); // Count pending to-dos

    return view('admin.dashboard', compact('todos', 'completedTodos', 'pendingTodos'));
}

}
