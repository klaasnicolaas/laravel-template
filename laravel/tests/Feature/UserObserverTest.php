<?php

use App\Models\User;
use Illuminate\Support\Facades\Storage;

it('deletes avatar from storage when user is deleted', function () {
    // Fake the public disk
    Storage::fake('public');

    // Create a user with an avatar and delete it
    $user = User::factory()->create(['avatar_url' => 'avatars/sample-avatar.jpg']);
    $user->delete();

    // Assert the avatar was deleted
    Storage::disk('public')->assertMissing('avatars/sample-avatar.jpg');
});

it('deletes the old avatar when avatar_url is updated', function () {
    // Fake the public disk
    Storage::fake('public');

    // Create a user with an avatar and update it
    $user = User::factory()->create(['avatar_url' => 'avatars/old-avatar.jpg']);
    Storage::disk('public')->put('avatars/old-avatar.jpg', 'fake content');
    Storage::disk('public')->put('avatars/new-avatar.jpg', 'new fake content');
    $user->update(['avatar_url' => 'avatars/new-avatar.jpg']);

    // Old avatar should be deleted and new avatar should exist
    Storage::disk('public')->assertMissing('avatars/old-avatar.jpg');
    Storage::disk('public')->assertExists('avatars/new-avatar.jpg');
});