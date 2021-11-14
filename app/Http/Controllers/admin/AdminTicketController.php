<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    private $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function index()
    {
        $tickets = $this->ticket->with('user','room')->get();
        // dd($tickets);
        return view('admin.pages.ticket.index', compact('tickets'));
    }
}
