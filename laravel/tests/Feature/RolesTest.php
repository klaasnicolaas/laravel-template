<?php

use App\Enums\UserRole;
use App\Models\Role;
use BezhanSalleh\FilamentShield\Resources\RoleResource;
use Filament\Actions\DeleteAction;

use function Pest\Livewire\livewire;

covers(RoleResource::class, App\Policies\RolePolicy::class);

beforeEach(function () {
    $this->admin = createUser(UserRole::ADMIN);
    $this->actingAs($this->admin);
});

it('can render roles index page', function () {
    $this->get(RoleResource::getUrl('index'))
        ->assertSuccessful();
});

it('unauthorized user cannot view roles', function () {
    $user = createUser();

    $this->actingAs($user)
        ->get(RoleResource::getUrl('index'))
        ->assertForbidden();
});

it('can view a role', function () {
    $role = Role::factory()->create();

    $this->get(RoleResource::getUrl('view', [
        'record' => $role,
    ]))
        ->assertSuccessful();
});

it('can create new role', function () {
    $newRole = Role::factory()->make();

    livewire(RoleResource\Pages\CreateRole::class)
        ->fillForm([
            'name' => $newRole->name,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Role::class, [
        'name' => $newRole->name,
    ]);
});

it('can render role edit page', function () {
    $this->get(RoleResource::getUrl('edit', [
        'record' => Role::factory()->create(),
    ]))->assertSuccessful();
});

it('can update role', function () {
    $role = Role::factory()->create();
    $newRole = Role::factory()->make();

    livewire(RoleResource\Pages\EditRole::class, [
        'record' => $role->getRouteKey(),
    ])
        ->fillForm([
            'name' => $newRole->name,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Role::class, [
        'name' => $newRole->name,
    ]);
});

it('can delete a role', function () {
    $role = Role::factory()->create();

    livewire(RoleResource\Pages\EditRole::class, [
        'record' => $role->getRouteKey(),
    ])
        ->callAction(DeleteAction::class)
        ->assertRedirect(RoleResource::getUrl('index'));

    $this->assertModelMissing($role);
});
