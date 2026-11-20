<?php

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
