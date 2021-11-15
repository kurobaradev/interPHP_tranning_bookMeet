<?php

use App\Http\Controllers\Api\BookRoomController;
use App\Http\Controllers\client\RoomController;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/room/{id}', [BookRoomController::class, 'getTicketBookRoom'])->name('api.bookroom');
Route::get('/department', function () {
    return Department::all();
});
