<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

