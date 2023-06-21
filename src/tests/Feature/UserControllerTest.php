<?php

use App\Models\User;

it('users.index', function () {
    $response = $this->get('/users');

    $response->assertStatus(200);
});

it('can create a user', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
    expect($user->name)->toBe('John Doe');
    expect($user->email)->toBe('john@example.com');
});

it('can delete a user', function () {
    $user = User::factory()->create();
    $user->delete();

    expect(User::find($user->id))->toBeNull();
});

todo('users.edit && update');
todo('users.groups.index');
todo('users.groups.edit && update');
todo('create ips e time works');
todo('login only users.active');
