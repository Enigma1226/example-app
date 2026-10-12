<?php

test('admin student page displays the student list', function () {
    $response = $this->get('/admin/student');

    $response
        ->assertOk()
        ->assertSee('Student')
        ->assertSee('NIS')
        ->assertSee('Name')
        ->assertSee('Class')
        ->assertSee('Search students')
        ->assertSee('Add student')
        ->assertSee('1001')
        ->assertSee('1010')
        ->assertSee('Joko');

    expect(substr_count($response->getContent(), '<tr'))->toBe(11);
});
