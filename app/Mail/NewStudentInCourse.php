<?php

namespace App\Mail;

use App\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewStudentInCourse extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Course
     */
    private $course;
    private $studentName;

    /**
     * Create a new message instance.
     *
     * @param Course $course
     * @param $studentName
     */
    public function __construct(Course $course, $studentName)
    {
        $this->course = $course;
        $this->studentName = $studentName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__('Nuevo estudiante inscrito'))
            ->markdown('emails.new_student_in_course')
            ->with('course', $this->course)
            ->with('student', $this->studentName);
    }
}
