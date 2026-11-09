<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        $title = 'Data Teachers';
        $teachers = Teacher::query()->orderBy('name')->get();

        return view('admin.teacher.index', compact('title', 'teachers'));
    }
}
