<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

//Routes for task
Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [\App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [\App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{id}/edit', [\App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');
//change status of the task
Route::get('/change-status/{id}', [\App\Http\Controllers\TaskController::class, 'changeStatus'])->name('tasks.changeStatus');