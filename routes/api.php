<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
// REGISTER
Route::post('/register', [AuthController::class, 'register'])->name('register');

// LOGIN
Route::post('/login', [AuthController::class, 'login'])->name('login');


// STUDENT 
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
// Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
