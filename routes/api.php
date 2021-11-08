<?php

use App\Http\Controllers\client\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('ajax',[RoomController::class,'ajaxRequest'])->name('book.getday');
Route::get('/room/{id}', [RoomController::class, 'book'])->name('room.book');
Route::get('/roomgetday', [TicketController::class, 'dayRequest'])->name('ajax.request');
