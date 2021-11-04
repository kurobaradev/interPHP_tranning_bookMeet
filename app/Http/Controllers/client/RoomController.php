<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\RoomMeets;
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
    }
}
