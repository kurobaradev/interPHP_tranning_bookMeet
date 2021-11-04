<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDepartmentController;
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
Auth::routes();

Route::middleware(['CheckLogin'])->group(function () {
    
    // client
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/room', [RoomController::class, 'index'])->name('room.index');
    Route::get('/room/{id}', [RoomController::class, 'book'])->name('room.book');
    
    
    //  admin
    Route::prefix('/admin')->group(function () {
        Route::get('/', [ AdminController::class,'index'])->name('dashboard.index');
        Route::prefix('/users')->group(function () {
            Route::get('/', [ AdminUserController::class,'index'])->name('users.index'); 
            // Route::post('/ban/{id}', [ AdminUserController::class,'ban'])->name('users.ban'); 
            // Route::post('/unban/{id}', [ AdminUserController::class,'unban'])->name('users.unban'); 
        });
        Route::prefix('/room-meet')->group(function () {
            Route::get('/', [ AdminRoomMeetController::class,'index'])->name('room-meet.index');
            Route::get('/create', [ AdminRoomMeetController::class,'create'])->name('room-meet.create');
            Route::post('/store', [ AdminRoomMeetController::class,'store'])->name('room-meet.store');
            Route::get('/edit/{id}', [ AdminRoomMeetController::class,'edit'])->name('room-meet.edit');
            Route::post('/update/{id}', [ AdminRoomMeetController::class,'update'])->name('room-meet.update');
            Route::get('/delete/{id}', [ AdminRoomMeetController::class,'delete'])->name('room-meet.delete');
          
        });
        Route::prefix('/department')->group(function () {
            Route::get('/', [ AdminDepartmentController::class,'index'])->name('department.index');
            Route::get('/create', [ AdminDepartmentController::class,'create'])->name('department.create');
            Route::post('/store', [ AdminDepartmentController::class,'store'])->name('department.store');
            Route::get('/edit/{id}', [ AdminDepartmentController::class,'edit'])->name('department.edit');
            Route::post('/update/{id}', [ AdminDepartmentController::class,'update'])->name('department.update');
            Route::get('/delete/{id}', [ AdminDepartmentController::class,'delete'])->name('department.delete');
          
        });
      
    });  
});

