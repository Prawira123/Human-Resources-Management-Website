<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('tasks', controller: TaskController::class);
Route::put('/tasks/taskStatus/{id}', [TaskController::class, 'taskStatus'])->name('tasks.taskStatus');

Route::resource('departments', controller: DepartmentController::class);
Route::put('/departments/departmentStatus/{id}', [DepartmentController::class, 'departmentStatus'])->name('departments.departmentStatus');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
