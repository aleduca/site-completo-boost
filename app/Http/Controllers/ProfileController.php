<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\AvatarService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $user->loadMissing('avatar');

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user profile information and/or avatar.
     */
    public function update(ProfileUpdateRequest $request, AvatarService $avatarService): RedirectResponse
    {
        $user = $request->user();

        $data = $request->safe()->only(['name', 'email']);

        if ($request->filled('password')) {
            $data['password'] = $request->validated('password');
        }

        if (! empty($data)) {
            $user->update($data);
        }

        if ($request->hasFile('avatar')) {
            $avatarService->upload($user, $request->file('avatar'));
        }

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Perfil atualizado com sucesso!');
    }
}
