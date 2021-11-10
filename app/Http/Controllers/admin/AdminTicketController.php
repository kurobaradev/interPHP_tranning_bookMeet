<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tickets;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    public function index()
    {
        $tickets = Tickets::all();
        // dd($tickets);
        return view('admin.pages.ticket.index')->with('tickets',$tickets);
    }
}
