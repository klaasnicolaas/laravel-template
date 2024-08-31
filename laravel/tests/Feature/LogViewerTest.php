<?php

use App\Enums\UserRole;

it('can view the log viewer page', function () {
    $this->actingAs(createUser(UserRole::ADMIN))
        ->get(route('log-viewer.index'))
        ->assertSuccessful();
});

it('unauthorized user cannot view the log viewer page', function () {
    $this->actingAs(createUser())
        ->get(route('log-viewer.index'))
        ->assertForbidden();
});
