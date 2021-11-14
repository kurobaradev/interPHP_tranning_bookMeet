<?php

namespace App\Mail;

// use App\Models\Tickets;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderRoomMeet extends Mailable
{
    use Queueable, SerializesModels;
    public $Ticket;

    public function __construct(Ticket $Ticket)
    {
        $this->Ticket = $Ticket;
    }

    public function build()
    {
        return $this->view('mail.oderroom');
    }
}
