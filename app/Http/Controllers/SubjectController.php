<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Contracts\View\View;

class SubjectController extends Controller
{
    public function index(): View
    {
        $title = 'Data Subjects';
        $subjects = Subject::query()->orderBy('name')->get();

        return view('admin.subject', compact('title', 'subjects'));
    }
}
