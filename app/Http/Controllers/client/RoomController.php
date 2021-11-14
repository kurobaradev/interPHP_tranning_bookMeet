<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Room;

class RoomController extends Controller
{

    private $room;
    public function __construct(Room $room)
    {
        $this->room = $room;
    }
    public function index()
    {
        $rooms =$this->room->all();
        return view('client.room', compact('rooms'));
    }
    public function book($id)
    {
        $room = $this->room->find($id);
        return view('client.book', compact('room'));
    }
}
