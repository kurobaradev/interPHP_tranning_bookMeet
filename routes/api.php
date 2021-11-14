<?php

use App\Http\Controllers\Api\BookRoomController;
use App\Http\Controllers\client\RoomController;
use App\Models\Department;
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

Route::get('/room/{id}', [BookRoomController::class, 'getTicketBookRoom'])->name('api.bookroom');
Route::get('/department', function () {
    return Department::all();
});
