<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of courses.
     */
    public function index(): View
    {
        $courses = Course::query()
            ->withCount('lessons')
            ->orderBy('title')
            ->get();

        return view('courses.index', [
            'courses' => $courses,
        ]);
    }
}
