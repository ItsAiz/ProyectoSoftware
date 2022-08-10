<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    public $subject = "Mensaje de cliente";

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build(): SendMessage
    {
        return $this->view('components.email.message')->with(['data' => $this->data]);
    }

}
