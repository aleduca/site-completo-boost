<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Builder;
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
            ->when($search !== '', function (Builder $query) use ($search): void {
                $query->where(function (Builder $subQuery) use ($search): void {
                    $subQuery->where('title', 'like', "%{$search}%")
                        ->orWhereHas('category', function (Builder $categoryQuery) use ($search): void {
                            $categoryQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->when($selectedCategory !== '', function (Builder $query) use ($selectedCategory): void {
                $query->whereHas('category', function (Builder $categoryQuery) use ($selectedCategory): void {
                    $categoryQuery->where('slug', $selectedCategory);
                });
            })
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
