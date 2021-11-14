<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
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
    public function dayRequest(Request $request)
    {

        $timeSlot = $this->timeSlot();
        // dd($timeSlot);
        $id_room = (string) $request->id_room;
        $date = (string) $request->date;
        $getDate = Ticket::where('id_room', $id_room)
            ->where('date', $date)
            ->pluck('start');
        return response()->json([$timeSlot, $getDate]);;
    }
    public function timeSlot()
    {
        $duration = 60;
        $cleanup = 0;
        $start = "08:00";
        $end = "24:00";
        $start = new DateTime($start);
        $end = new DateTime($end);
        $interval = new DateInterval("PT" . $duration . "M");
        $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
        $slots = array();
        for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);
            if ($endPeriod > $end) {
                break;
            }
            $slots[] = $intStart->format("H:i:s");
        }
        return $slots;
    }
    public function bookroom(Request $request)
    {
        $time = $request->timeSlot;
        $timeSlot =  explode('?',$time);
        $date = $request->date;
        $start = $date.' '.$timeSlot[0];
        $end = $date.' '.$timeSlot[1];
        $room_id = (int)$request->room_id;
        $startbook = $start;
        $endbook = $end;

        $dataOderCreate = Ticket::create([
            'room_id'=> $room_id,
            'start'=> $startbook,
            'end'=> $endbook,
            'date'=> $date,
            'user_id'=> Auth::user()->id,
            ]);
        Mail::to(Auth::user()->email)->send(new OrderRoomMeet($dataOderCreate));
        $dataOderCreate->save();
        session()->flash('success', 'Đặt tour thành công !.');
        return redirect(route('room.index'));

    }
}
