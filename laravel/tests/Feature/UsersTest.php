<?php

use App\Enums\UserRole;
use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions\DeleteAction;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->admin = createUser(UserRole::Admin);
    $this->actingAs($this->admin);
});

it('can render users index page', function () {
    $this->get(UserResource::getUrl('index'))
        ->assertSuccessful();
});

it('can create new user', function () {
    $newUser = User::factory()->make();

    livewire(UserResource\Pages\CreateUser::class)
        ->fillForm([
            'name' => $newUser->name,
            'email' => $newUser->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(User::class, [
        'name' => $newUser->name,
        'email' => $newUser->email,
    ]);
});

it('can render user edit page', function () {
    $this->get(UserResource::getUrl('edit', [
        'record' => User::factory()->create(),
    ]))->assertSuccessful();
});

it('can update user', function () {
    $user = User::factory()->create();
    $newUser = User::factory()->make();

    livewire(UserResource\Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])
        ->fillForm([
            'name' => $newUser->name,
            'email' => $newUser->email,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(User::class, [
        'name' => $newUser->name,
        'email' => $newUser->email,
    ]);
});

it('can delete user', function () {
    $user = User::factory()->create();

    livewire(UserResource\Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])
        ->callAction(DeleteAction::class)
        ->assertRedirect(UserResource::getUrl('index'));

    $this->assertModelMissing($user);
});
