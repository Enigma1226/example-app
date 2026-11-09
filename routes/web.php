<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/admin/about', [AboutController::class, 'index']);
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/student', [StudentController::class, 'index'])->name('admin.student');
Route::get('/admin/classroom', [ClassroomController::class, 'index'])->name('admin.classroom');
Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('admin.subjects');
Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('admin.teachers');
