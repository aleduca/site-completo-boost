<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
	/**
	 * Show the login form.
	 */
	public function showLoginForm(): View
	{
		return view('auth.login');
	}

	/**
	 * Handle an incoming authentication request.
	 */
	public function login(Request $request): RedirectResponse
	{
		$credentials = $request->validate([
			'email' => ['required', 'string', 'email'],
			'password' => ['required', 'string'],
		], [
			'email.required' => 'O campo e-mail é obrigatório.',
			'email.email' => 'Por favor, informe um endereço de e-mail válido.',
			'password.required' => 'O campo senha é obrigatório.',
		]);

		$remember = $request->boolean('remember');

		if (Auth::attempt($credentials, $remember)) {
			$request->session()->regenerate();

			return redirect()->intended(route('home'))->with('success', 'Bem-vindo de volta, ' . Auth::user()->name . '!');
		}

		return back()
			->withInput($request->only('email'))
			->with('error', 'As credenciais fornecidas estão incorretas. Por favor, verifique seu e-mail e senha.');
	}

	/**
	 * Log the user out of the application.
	 */
	public function logout(Request $request): RedirectResponse
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('home')->with('success', 'Você saiu da sua conta com sucesso.');
	}
}
