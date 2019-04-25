<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $courses = Course::withCount(['students'])
            ->with('category', 'teacher', 'reviews')
            ->where('status', Course::PUBLISHED)
            ->latest()
            ->paginate(12);

        return view('home', compact('courses'));
    }
}
