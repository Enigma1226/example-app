<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(): View
    {
        $title = 'Data Siswa';
        $students = Student::all();
        $classrooms = Classroom::query()->orderBy('name')->get();

        return view('admin.student.index', compact('title', 'students', 'classrooms'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nis' => ['required', 'integer', 'min:0', 'max:2147483647', 'unique:students,nis'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'address' => ['required', 'string'],
        ], [
            'nis.required' => 'NIS tidak boleh kosong.',
            'nis.unique' => 'NIS sudah terdaftar.',
            'nama.required' => 'Nama tidak boleh kosong.',
            'classroom_.id.required' => 'kelas wajib dipilih.',
            'classroom_id.exists' => 'kelas tidak valid.',
            'address.address' => 'Format alamat tidak valid.',
        ]);

        Student::create($validated);

        return redirect()->route('admin.student.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }
}
