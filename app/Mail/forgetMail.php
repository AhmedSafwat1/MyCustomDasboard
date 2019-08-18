<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class forgetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Build the code.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.forget', ['code' => $this->code]);
    }
}
