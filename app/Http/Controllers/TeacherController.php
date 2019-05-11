<?php

namespace App\Http\Controllers;

use App\Student;
use DataTables;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function courses()
    {

    }

    public function students()
    {
        $students = Student::with('user', 'courses.reviews')
            ->whereHas('courses', function ($query) {
                $query->where('teacher_id', auth()->user()->teacher->id)->withTrashed();
            })->get();

        $actions = 'students.datatables.actions';
        return DataTables::of($students)->addColumn('actions', $actions)->rawColumns(['actions', 'courses_formatted'])->make(true);
    }

    public function send_message_to_student()
    {

    }
}
