<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $messageText;
    public $fullName;
    public $emailUser;
    public $phoneUser;
    public $subject;
    public function __construct($fullName, $emailUser, $phoneUser, $subject, $messageText)
    {
         $this->messageText = $messageText;
          $this->fullName=$fullName;
          $this->emailUser=$emailUser;
          $this->phoneUser=$phoneUser;
          $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject( $this->subject)->view('emails.contact');
    }
}
