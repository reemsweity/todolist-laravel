@extends('layout.app')
@section('content')
    <div class="container mt-5">
        <h1>{{ $todo->title }}</h1>
        <p>{{ $todo->description }}</p>
        <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

  

@endsection