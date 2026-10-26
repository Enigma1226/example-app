<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Contracts\View\View;

class ClassroomController extends Controller
{
    public function index(): View
    {
        $title = 'Data Classroom';
        $classrooms = Classroom::query()->orderBy('name')->get();

        return view('admin.classroom', compact('title', 'classrooms'));
    }
}
