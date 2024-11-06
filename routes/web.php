<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[TaskController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('task/create',[TaskController::class,'create'])->name('task.create');
    Route::post('task',[TaskController::class,'store'])->name('task.store');
    Route::get('{task}',[TaskController::class,'edit'])->name('task.edit');
    Route::put('{task}',[TaskController::class,'update'])->name('task.update');
});

require __DIR__.'/auth.php';
