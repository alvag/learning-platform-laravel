<?php

namespace App\Http\Controllers;

use App\Mail\MessageToStudent;
use App\Student;
use App\User;
use DataTables;
use Exception;
use Illuminate\Http\Request;
use Mail;

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

    public function sendMessageToStudent()
    {
        $info = request('info');
        $data = [];
        parse_str($info, $data);
        $user = User::findOrFail($data['user_id']);

        try {
            Mail::to($user)->send(new MessageToStudent(auth()->user()->name, $data['message']) );
            return response()->json(['res' => true]);
        } catch (Exception $e) {
            return response()->json(['res' => false, 'error' => $e->getMessage()]);
        }

    }
}
