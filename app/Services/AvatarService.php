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

        $avatar = $user->avatar()->create([
            'path' => $path,
        ]);

        $user->setRelation('avatar', $avatar);

        return $avatar;
    }

    /**
     * Delete the existing user avatar from storage and database.
     */
    public function delete(User $user): bool
    {
        $existingAvatar = $user->avatar()->first();

        if ($existingAvatar !== null) {
            if (Storage::disk('public')->exists($existingAvatar->path)) {
                Storage::disk('public')->delete($existingAvatar->path);
            }

            $existingAvatar->delete();
            $user->unsetRelation('avatar');

            return true;
        }

        $user->unsetRelation('avatar');

        return false;
    }
}
