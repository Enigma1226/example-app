<?php

use App\Models\Classroom;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('student page shows the add-student modal fields and available classrooms', function () {
    $classroom = Classroom::factory()->create();

    $response = $this->get(route('admin.student'));

    $response
        ->assertOk()
        ->assertSee('student-modal')
        ->assertSee('NAMA LENGKAP')
        ->assertSee('NIS')
        ->assertSee('KELAS')
        ->assertSee('ALAMAT')
        ->assertSee($classroom->name)
        ->assertSee(route('admin.student.store'));
});

test('student can be added from the modal form', function () {
    $classroom = Classroom::factory()->create();

    $response = $this->post(route('admin.student.store'), [
        'name' => 'Ayu Lestari',
        'nis' => 12345,
        'classroom_id' => $classroom->id,
        'address' => 'Jalan Melati No. 10',
    ]);

    $response
        ->assertRedirect(route('admin.student'))
        ->assertSessionHas('success', 'Data siswa berhasil ditambahkan.');

    $this->assertDatabaseHas('students', [
        'name' => 'Ayu Lestari',
        'nis' => 12345,
        'classroom_id' => $classroom->id,
        'address' => 'Jalan Melati No. 10',
    ]);
});

test('student form validates required fields', function () {
    $response = $this->post(route('admin.student.store'), []);

    $response->assertSessionHasErrors(['name', 'nis', 'classroom_id', 'address']);
});
