<?php

use App\Filament\Pages\EditProfile;
use App\Models\User;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->admin = createUser('Super Admin');
    $this->actingAs($this->admin);
});

it('can render edit profile page', function () {
    $this->get(EditProfile::getUrl())
        ->assertSuccessful();
});

it('can succesfull update user profile', function () {
    $newUser = User::factory()->make();

    livewire(EditProfile::class)
        ->fillForm([
            'name' => $newUser->name,
            'email' => $newUser->email,
        ], 'editProfileForm')
        ->call('updateProfile')
        ->assertHasNoFormErrors([], 'editProfileForm')
        ->assertRedirect(route('filament.admin.pages.dashboard'));

    $this->assertDatabaseHas(User::class, [
        'name' => $newUser->name,
        'email' => $newUser->email,
    ]);
});

it('can succesfull update user password', function () {
    $newPassword = 'new-password';

    livewire(EditProfile::class)
        ->fillForm([
            'Current password' => 'password',
            'password' => $newPassword,
            'passwordConfirmation' => $newPassword,
        ], 'editPasswordForm')
        ->call('updatePassword')
        ->assertHasNoFormErrors([], 'editPasswordForm')
        ->assertRedirect(route('filament.admin.pages.dashboard'));

    $this->assertTrue(Hash::check($newPassword, $this->admin->password));
});

test('validates user profile update with invalid email', function () {
    $newUser = User::factory()->make();

    livewire(EditProfile::class)
        ->fillForm([
            'name' => $newUser->name,
            'email' => 'invalid-email',
        ], 'editProfileForm')
        ->call('updateProfile')
        ->assertHasFormErrors(['email'], 'editProfileForm');
});

test('validates password update with wrong current password and password confirmation', function () {
    // Arrange
    $newPassword = 'new-password';

    // Act & Assert for wrong current password
    livewire(EditProfile::class)
        ->fillForm([
            'Current password' => 'wrong-password',
            'password' => $newPassword,
            'passwordConfirmation' => $newPassword,
        ], 'editPasswordForm')
        ->call('updatePassword')
        ->assertHasFormErrors(['Current password'], 'editPasswordForm');

    // Act & Assert for wrong password confirmation
    livewire(EditProfile::class)
        ->fillForm([
            'Current password' => 'password',
            'password' => $newPassword,
            'passwordConfirmation' => 'wrong-password',
        ], 'editPasswordForm')
        ->call('updatePassword')
        ->assertHasFormErrors(['passwordConfirmation' => 'same'], 'editPasswordForm');
});
