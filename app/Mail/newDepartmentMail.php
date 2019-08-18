<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class newDepartmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Build the item.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newDepartment', ['item' => $this->item]);
    }
}
