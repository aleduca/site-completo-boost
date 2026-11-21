<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of lessons with optional search and category filters.
     */
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();
        $selectedCategory = $request->string('category')->trim()->toString();

        $lessons = Lesson::query()
            ->with(['category', 'course'])
            ->filter($search, $selectedCategory)
            ->latest('id')
            ->paginate(8)
            ->withQueryString();

        $categories = Category::query()
            ->withCount('lessons')
            ->orderBy('name')
            ->get();

        return view('home', [
            'lessons' => $lessons,
            'categories' => $categories,
            'search' => $search,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}
