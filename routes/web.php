<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Todo Routes
Route::middleware('auth')->group(function () {
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/todos/{todo}', [TodoController::class, 'show'])->name('todos.show');  // Binding Todo model
    Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit'); // Binding Todo model
    Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update'); // Binding Todo model
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy'); // Binding Todo model
});



// Admin Dashboard Route
Route::get('/admin/dashboard', [TodoController::class, 'adminDashboard'])->name('admin.dashboard')
    ->middleware('auth');

require __DIR__.'/auth.php';
