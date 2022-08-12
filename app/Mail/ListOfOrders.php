<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListOfOrders extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Listado de domicilios";

    public function __construct()
    {

    }

    public function build(): ListOfOrders
    {
        return $this->view('components.email.messageTwo');
    }
}
