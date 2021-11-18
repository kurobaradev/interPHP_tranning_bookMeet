<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Mail\OrderRoomMeet;
use App\Models\RoomMeets;
use App\Models\Ticket;
use App\Models\Tickets;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{

    public $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }
    public function bookroom(StoreTicketRequest $request)
    {
        $time = $request->timeSlot;
        $timeSlot =  explode('?', $time);
        $date = $request->date;
        $start = $date.' '.$timeSlot[0];
        $end = $date.' '.$timeSlot[1];
        $roomId = $request->room_id;
        $startbook = $start;
        $endbook = $end;

        $dataOderCreate =  $this->ticket->create([
            'room_id'=> $roomId,
            'start'=> $startbook,
            'end'=> $endbook,
            'date'=> $date,
            'user_id'=> Auth::user()->id,
            ]);
            // dd($dataOderCreate);
        Mail::to(Auth::user()->email)->send(new OrderRoomMeet($dataOderCreate));
        ;
        // $dataOderCreate->save();
        session()->flash('success', 'Đặt tour thành công !.');
        return redirect(route('home.index'));
    }
}
