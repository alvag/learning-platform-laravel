<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageToStudent extends Mailable
{
    use Queueable, SerializesModels;
    private $teacher;
    private $textMessage;

    /**
     * Create a new message instance.
     *
     * @param $teacher
     * @param $textMessage
     */
    public function __construct($teacher, $textMessage)
    {
        $this->teacher = $teacher;
        $this->textMessage = $textMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__('Mensaje de :teacher', ['teacher' => $this->teacher]))
            ->markdown('emails.message_to_student')->with('textMessage', $this->textMessage);
    }
}
