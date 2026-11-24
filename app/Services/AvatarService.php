<?php

namespace App\Services;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AvatarService
{
    /**
     * Upload or update the user avatar, removing any existing file.
     */
    public function upload(User $user, UploadedFile $file): Avatar
    {
        $this->delete($user);

        $path = $file->store('avatars', 'public');

        return $user->avatar()->create([
            'path' => $path,
        ]);
    }

    /**
     * Delete the existing user avatar from storage and database.
     */
    public function delete(User $user): bool
    {
        $existingAvatar = $user->avatar;

        if ($existingAvatar !== null) {
            if (Storage::disk('public')->exists($existingAvatar->path)) {
                Storage::disk('public')->delete($existingAvatar->path);
            }

            $existingAvatar->delete();

            return true;
        }

        return false;
    }
}
