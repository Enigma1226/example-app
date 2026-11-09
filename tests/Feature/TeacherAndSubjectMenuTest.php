<?php

use App\Models\Subject;
use App\Models\Teacher;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('subjects menu displays subject records', function () {
    $subject = Subject::factory()->create(['name' => 'Matematika']);

    $this->get(route('admin.subjects'))
        ->assertOk()
        ->assertSee('Data Subjects')
        ->assertSee($subject->name);
});

test('teachers menu displays teacher records', function () {
    $teacher = Teacher::factory()->create([
        'name' => 'Budi Santoso',
        'niy' => 1234567890,
        'subjects' => 'Matematika',
        'start_date' => '2020-01-15',
    ]);

    $this->get(route('admin.teachers'))
        ->assertOk()
        ->assertSee('Data Teachers')
        ->assertSee($teacher->name)
        ->assertSee((string) $teacher->niy)
        ->assertSee('2020-01-15');
});

test('subject and teacher seeders create at least ten records each', function () {
    $this->seed(DatabaseSeeder::class);

    expect(Subject::query()->count())->toBeGreaterThanOrEqual(10)
        ->and(Teacher::query()->count())->toBeGreaterThanOrEqual(10);
});
