<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminRoomMeetController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\client\RoomController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/room', [RoomController::class, 'index'])->name('room.index');


Route::prefix('/admin')->group(function () {
    Route::get('/', [ AdminController::class,'index'])->name('dashboard.index');
    Route::prefix('/users')->group(function () {
        Route::get('/', [ AdminUserController::class,'index'])->name('users.index');
      
    });
    Route::prefix('/room-meet')->group(function () {
        Route::get('/', [ AdminRoomMeetController::class,'index'])->name('room-meet.index');
        Route::get('/create', [ AdminRoomMeetController::class,'create'])->name('room-meet.create');
        Route::post('/store', [ AdminRoomMeetController::class,'store'])->name('room-meet.store');
        Route::get('/edit/{id}', [ AdminRoomMeetController::class,'edit'])->name('room-meet.edit');
        Route::post('/update/{id}', [ AdminRoomMeetController::class,'update'])->name('room-meet.update');
        Route::get('/delete/{id}', [ AdminRoomMeetController::class,'delete'])->name('room-meet.delete');
      
    });
  
});

Auth::routes();