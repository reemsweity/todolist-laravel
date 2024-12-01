@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1>To-Do List</h1>
        <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create New Todo</a>
        <ul class="list-group">
            @foreach ($todos as $todo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $todo->title }}
                    
                    <div>
                        <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

  @endsection