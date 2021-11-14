<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDepartmentController;
use App\Http\Controllers\admin\AdminRoomController;
use App\Http\Controllers\admin\AdminTicketController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\client\RoomController;
use App\Http\Controllers\client\TicketController;
use App\Http\Controllers\HomeController;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

// middlwerare checklogin
Route::middleware(['CheckLogin'])->group(function () {

    // client get
    // get all room
    Route::get('/', [RoomController::class, 'index'])->name('home.index');

    // take room by id
    Route::get('/rooms/{id}', [RoomController::class, 'book'])->name('room.book');

    //get day of room

    Route::post('/bookroom', [TicketController::class, 'bookroom'])->name('room.bookroom');

    //  admin
    Route::prefix('/admin')->group(function () {

        //dashboard
        Route::get('/', [AdminController::class, 'index'])->name('dashboard.index');

        // manager user
        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('users.index');
            Route::get('/ban/{id}', [AdminUserController::class, 'ban'])->name('users.ban');
            Route::get('/unban/{id}', [AdminUserController::class, 'unban'])->name('users.unban');
            // Route::post('/', [AdminUserController::class, 'unban'])->name('unban.index');
        });

        // manager  room
        Route::prefix('/rooms')->group(function () {
            // get
            Route::get('/', [AdminRoomController::class, 'index'])->name('rooms.index');
            Route::get('/create', [AdminRoomController::class, 'create'])->name('rooms.create');
            Route::get('/edit/{id}', [AdminRoomController::class, 'edit'])->name('rooms.edit');
            Route::get('/delete/{id}', [AdminRoomController::class, 'delete'])->name('rooms.delete');
            // post
            Route::post('/store', [AdminRoomController::class, 'store'])->name('rooms.store');
            Route::post('/update/{id}', [AdminRoomController::class, 'update'])->name('rooms.update');
        });

        // manager Department room
        Route::prefix('/departments')->group(function () {
            // get
            Route::get('/', [AdminDepartmentController::class, 'index'])->name('departments.index');
            // create
            Route::get('/create', [AdminDepartmentController::class, 'create'])->name('departments.create');
            Route::post('/store', [AdminDepartmentController::class, 'store'])->name('departments.store');
            // edit
            Route::get('/edit/{id}', [AdminDepartmentController::class, 'edit'])->name('departments.edit');
            Route::post('/update/{id}', [AdminDepartmentController::class, 'update'])->name('departments.update');
            // delete
            Route::get('/delete/{id}', [AdminDepartmentController::class, 'delete'])->name('departments.delete');
        });

        // manager ticket join  room
        Route::prefix('/ticket')->group(function () {
            // get
            Route::get('/', [AdminTicketController::class, 'index'])->name('tickets.index');
            // Route::get('/create', [AdminDepartmentController::class, 'create'])->name('department.create');
            // Route::get('/edit/{id}', [AdminDepartmentController::class, 'edit'])->name('department.edit');
            // Route::get('/delete/{id}', [AdminDepartmentController::class, 'delete'])->name('department.delete');
            // post

        });

    });
});
