<?php

namespace App\Mail;

// use App\Models\Tickets;

use App\Models\Tickets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderRoomMeet extends Mailable
{
    use Queueable, SerializesModels;
    public $Tickets;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tickets $Tickets)
    {
        $this->Tickets = $Tickets;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.oderroom');
    }
}
