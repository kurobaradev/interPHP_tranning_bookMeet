<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Tickets;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function dayRequest(Request $request)
    {

        $timeSlot = $this->timeSlot();
        // dd($timeSlot);
        $id_room = (string) $request->id_room;
        $date = (string) $request->date;
        $getDate = Tickets::where('id_room', $id_room)
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
    public function booka(Request $request)
    {
       dd($request->all());
        return view('welcome');
    }
}
