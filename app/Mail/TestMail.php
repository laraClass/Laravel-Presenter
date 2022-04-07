<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    private $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = "ali alavi";
        $this->password = "12345";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test')->with([
            'token' => $this->password
        ]);
    }
}
