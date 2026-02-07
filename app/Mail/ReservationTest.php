<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationTest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $fullName;
    public $phoneUser;
    public $subject = "Demande d'essai";
    public $Url_pub;
    public $date;
    public function __construct($fullName, $phoneUser,$date, $Url_pub )
    {
          $this->fullName=$fullName;
          $this->phoneUser=$phoneUser;
          $this->Url_pub = $Url_pub;
          $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.reservation');
    }
}
