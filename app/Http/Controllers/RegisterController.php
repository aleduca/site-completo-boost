<?php

namespace App\Http\Controllers;

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
}
