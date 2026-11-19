<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lessons', [HomeController::class, 'index'])->name('lessons.index');

Route::get('/courses', function () {
    $courses = Course::withCount('lessons')->orderBy('title')->get();

    return view('courses.index', compact('courses'));
})->name('courses.index');

Route::get('/categories', function () {
    $categories = Category::withCount('lessons')->orderBy('name')->get();

    return view('categories.index', compact('categories'));
})->name('categories.index');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
