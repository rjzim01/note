<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('notes');
});

Route::get('/dashboard1', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/dashboard', function () {
    return view('crud.dashboard');
    // return view('dashboard1');
})->middleware(['auth', 'verified'])->name('dashboard1');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/notes', [CreateController::class, 'Notes'])->name('notes');
    // Route::get('/create', [CreateController::class, 'create'])->name('create');
    Route::post('/create', [CreateController::class, 'post'])->name('createPost');
    Route::post('/update', [CreateController::class, 'Update'])->name('updateNote');
    // Route::get('/delete/{noteId}', [CreateController::class, 'Delete'])->name('deleteNote');
    Route::post('/delete', [CreateController::class, 'Delete'])->name('deleteNote');
    Route::get('/search', [CreateController::class, 'Search'])->name('search');
});