<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
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
