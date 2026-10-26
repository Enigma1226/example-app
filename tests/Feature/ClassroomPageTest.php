<?php

use Database\Seeders\ClassroomSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('admin classroom page displays the seeded classroom list', function () {
    $this->seed(ClassroomSeeder::class);

    $response = $this->get(route('admin.classroom'));

    $response
        ->assertOk()
        ->assertSee('Data Classroom')
        ->assertSee('/admin/classroom')
        ->assertSee('Classroom')
        ->assertSee('Jurusan')
        ->assertSee('Wali Kelas')
        ->assertSee('11 PPLG 1')
        ->assertSee('11 PPLG 2')
        ->assertSee('11 PPLG 3');

    $this->assertDatabaseCount('classrooms', 3);
    expect(substr_count($response->getContent(), '<tr'))->toBe(4);
});

test('database seeder creates students and classrooms', function () {
    $this->seed(DatabaseSeeder::class);

    $this->assertDatabaseCount('students', 20);
    $this->assertDatabaseCount('classrooms', 3);
});
