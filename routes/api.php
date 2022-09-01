<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\TransportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
// REGISTER
Route::post('/register', [AuthController::class, 'register'])->name('register');

// LOGIN
Route::post('/login', [AuthController::class, 'login'])->name('login');


// STUDENT 
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

// HOMEWORK
Route::get('/homework', [HomeworkController::class, 'index'])->name('homework.index');


// BOOKS
Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/issued', [BookController::class, 'issuedBooks'])->name('book.issuedBooks');


// NOTICE
Route::get('/notices', [NoticeController::class, 'index'])->name('notice.index');

// ASSIGNMENTS
Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignment.index');


// SYLLABUS
Route::get('/syllabus', [SyllabusController::class, 'index'])->name('syllabus.index');

// TRANSPORT 
Route::get('/transport', [TransportController::class, 'index'])->name('transport.index');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
