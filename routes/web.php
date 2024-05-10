<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('notes', NoteController::class)->middleware(['auth', 'verified'])->names('notes');

Route::resource('todos', TodoController::class)->middleware(['auth', 'verified'])->names('todos');
Route::put('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todos.complete');
Route::put('/todos/{todo}/uncomplete', [TodoController::class, 'uncomplete'])->name('todos.uncomplete');

require __DIR__ . '/auth.php';
