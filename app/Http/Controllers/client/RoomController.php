<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\RoomMeets;
use DateTime;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = RoomMeets::all();
        return view('client.room', compact('rooms'));
    }
    public function book($id)
    {
        $room = RoomMeets::find($id);
        return view('client.book', compact('room'));
        // return response()->json( $room);
    }
    public function bookroom(Request $request)
    {
        $room_id = $request->room_id;
        $date = $request->date;
        $time = $request->timeSlot;
        $timeSlot =  explode('?',$time);
        $start = $timeSlot[0];
        $end = $timeSlot[1];
        $startbook = $start;
        $endbook = $end;
        dd($room_id);

      
    }
}
