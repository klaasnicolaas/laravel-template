<?php

use App\Enums\UserRole;
use Filament\Facades\Filament;
use Filament\Pages\Auth\Login;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->user = createUser(UserRole::USER);
});

test('unauthenticated users are redirected to login page', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

test('unauthenticated user cannot login admin panel', function () {
    Filament::setCurrentPanel(Filament::getPanel('custom'));

    livewire(Login::class)
        ->fillForm([
            'email' => $this->user->email,
            'password' => 'password',
        ])
        ->call('authenticate')
        ->assertHasFormErrors(['email']);

    $this->assertGuest();
});
