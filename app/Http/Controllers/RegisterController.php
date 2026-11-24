<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AvatarService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Show the user registration form.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming user registration request.
     */
    public function store(RegisterRequest $request, AvatarService $avatarService): RedirectResponse
    {
        $user = User::create($request->safe()->only(['name', 'email', 'password']));

        if ($request->hasFile('avatar')) {
            $avatarService->upload($user, $request->file('avatar'));
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso! Bem-vindo ao Clube Full-Stack, '.$user->name.'.');
    }
}
