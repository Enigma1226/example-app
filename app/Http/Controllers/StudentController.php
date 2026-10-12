<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $title = 'Data Siswa';
        $students = Student::all();

        return view('admin.student', compact('title', 'students'));
    }
}
