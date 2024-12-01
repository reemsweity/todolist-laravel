@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <!-- Statistics Section -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Todos</h5>
                    <p class="card-text">{{ $todos->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Completed Todos</h5>
                    <p class="card-text">{{ $completedTodos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Todos</h5>
                    <p class="card-text">{{ $pendingTodos }}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create New Todo</a>
    <!-- Todos List -->
    <div class="card">
        <div class="card-header">
            <h3>All Todos</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>{{ ucfirst($todo->status) }}</td>
                        <td>
                            <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
