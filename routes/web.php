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


Route::get('/', function () {
    dd(Department::all());
    return ;
});
// user
Auth::routes();

Route::get('/', [RoomController::class, 'index'])->name('room.index');

// middlwerare checklogin
Route::middleware(['CheckLogin'])->group(function () {

    // client get
    // get all room
    Route::get('/', [RoomController::class, 'index'])->name('room.index');

    // take room by id
    Route::get('/room/{id}', [RoomController::class, 'book'])->name('room.book');

    //get day of room
    Route::get('/roomgetday', [TicketController::class, 'dayRequest'])->name('ajax.request');

    // test
    Route::get('/booktesst', [TicketController::class, 'booka'])->name('room.booktesst');
    // client post

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
        Route::prefix('/room')->group(function () {
            // get
            Route::get('/', [AdminRoomController::class, 'index'])->name('room.index');
            Route::get('/create', [AdminRoomController::class, 'create'])->name('room.create');
            Route::get('/edit/{id}', [AdminRoomController::class, 'edit'])->name('room.edit');
            Route::get('/delete/{id}', [AdminRoomController::class, 'delete'])->name('room.delete');
            // post
            Route::post('/store', [AdminRoomController::class, 'store'])->name('room.store');
            Route::post('/update/{id}', [AdminRoomController::class, 'update'])->name('room.update');
        });

        // manager Department room
        Route::prefix('/department')->group(function () {
            // get
            Route::get('/', [AdminDepartmentController::class, 'index'])->name('department.index');
            Route::get('/create', [AdminDepartmentController::class, 'create'])->name('department.create');
            Route::get('/edit/{id}', [AdminDepartmentController::class, 'edit'])->name('department.edit');
            Route::get('/delete/{id}', [AdminDepartmentController::class, 'delete'])->name('department.delete');
            // post
            Route::post('/store', [AdminDepartmentController::class, 'store'])->name('department.store');
            Route::post('/update/{id}', [AdminDepartmentController::class, 'update'])->name('department.update');
        });

        // manager ticket join  room
        Route::prefix('/ticket')->group(function () {
            // get
            Route::get('/', [AdminTicketController::class, 'index'])->name('ticket.index');
            // Route::get('/create', [AdminDepartmentController::class, 'create'])->name('department.create');
            // Route::get('/edit/{id}', [AdminDepartmentController::class, 'edit'])->name('department.edit');
            // Route::get('/delete/{id}', [AdminDepartmentController::class, 'delete'])->name('department.delete');
            // post

        });

    });
});
// //department
// Route::get('/',function(){
//     return redirect()->route('department.get');
// })
// ->middleware('isLogin');
// Route::get('/department','App\Http\Controllers\DepartmentController@index')
// ->middleware('isLogin')
// ->name('department.get'); //get
// Route::post('/department','App\Http\Controllers\DepartmentController@inserts')
// ->middleware('isLogin')
// ->name('department.post'); //post
// Route::get('delete-department/{id}','App\Http\Controllers\DepartmentController@deletes')
// ->middleware('isLogin')
// ->name('department.delete'); //delete
// Route::get('edit-department/{id}','App\Http\Controllers\DepartmentController@edits')
// ->middleware('isLogin')
// ->name('department.edit'); //get edit
// Route::post('update-department','App\Http\Controllers\DepartmentController@updates')
// ->middleware('isLogin')
// ->name('department.update');
// Route::get('searchDepartment','App\Http\Controllers\DepartmentController@search')
// ->middleware('isLogin')
// ->name('department.search');

// //auth-get
// Route::get('/login','App\Http\Controllers\AuthController@login')
// ->middleware('inLogin')
// ->name('login.get');
// Route::get('register','App\Http\Controllers\AuthController@register')
// ->middleware('inLogin','registerMiddle')
// ->name('register.get');
// Route::get('forgot','App\Http\Controllers\ResetPasswordController@forgot')
// ->middleware('inLogin')
// ->name('forgot.get');
// Route::get('logout', 'App\Http\Controllers\AuthController@logOut')
// ->name('logout');
// Route::get('reset-password/{token}','App\Http\Controllers\ResetPasswordController@showResetPasswordForm')
// ->middleware('inLogin')
// ->name('reset.password.get');

// //auth-post
// Route::post('/registered','App\Http\Controllers\AuthController@signup')
// ->middleware('registerMiddle')
// ->name('register.post');
// Route::post('signin','App\Http\Controllers\AuthController@signin')
// ->middleware('inLogin')
// ->name('signin');
// Route::post('sendMail','App\Http\Controllers\ResetPasswordController@sendMail')
// ->middleware('mailMiddle')
// ->name('sendmail');
// Route::post('reset-password','App\Http\Controllers\ResetPasswordController@resetPassword')
// ->middleware('isConfigPassword')
// ->name('reset.password.post');

// //user
// Route::get('/user','App\Http\Controllers\UserController@index')
// ->middleware('isLogin')
// ->name('user.get');
// Route::get('searchUser','App\Http\Controllers\UserController@search')
// ->middleware('isLogin')
// ->name('user.search');
// //room
// Route::get('/room', 'App\Http\Controllers\RoomController@index')
// ->middleware('isLogin')
// ->name('room.get');
// Route::post('/insert--room', 'App\Http\Controllers\RoomController@inserts')
// ->middleware('isLogin')
// ->name('room.post');
// Route::get('delete-room/{id}','App\Http\Controllers\RoomController@deletes')
// ->middleware('isLogin')
// ->name('room.delete');
// Route::get('edit-room/{id}','App\Http\Controllers\RoomController@edits')
// ->middleware('isLogin')
// ->name('room.edit');
// Route::post('update-room','App\Http\Controllers\RoomController@updates')
// ->middleware('isLogin')
// ->name('room.update');
// Route::get('searchRoom','App\Http\Controllers\RoomController@search')
// ->middleware('isLogin')
// ->name('room.search');

// //bookroom
// Route::get('book-room', 'App\Http\Controllers\BookroomController@index')
// ->middleware('isLogin')
// ->name('book-room');
// Route::get('book-room-date/{id}', 'App\Http\Controllers\BookroomController@viewBook')
// ->middleware('isLogin')
// ->name('book.room.date');
// Route::post('book-room-post','App\Http\Controllers\BookroomController@bookRoom')
// ->middleware('isLogin')
// ->name('book.room.post');
// Route::post('book-room-date-post','App\Http\Controllers\BookroomController@book')
// ->middleware('isLogin','BookdateMiddle')
// ->name('book.post');

// Route::get('manager-book-room', 'App\Http\Controllers\BookroomController@viewManager')
// ->middleware('isLogin')
// ->name('manager.book.room');
// Route::get('cancel-manager-book-room/{id}', 'App\Http\Controllers\BookroomController@deletes')
// ->middleware('isLogin')
// ->name('manager.book.room.cancel');
// Route::get('searchTicket','App\Http\Controllers\BookroomController@search')
// ->middleware('isLogin')
// ->name('ticket.search');
// //join user
// Route::get('join-user/{id}','App\Http\Controllers\JoinUserController@viewJoin')
// ->middleware('isLogin')
// ->name('join.user.get');
// Route::post('add-user','App\Http\Controllers\JoinUserController@joinUser')
// ->middleware('isLogin')
// ->name('join.user.post');
// Route::get('is-join-user/{id}','App\Http\Controllers\JoinUserController@viewNumberJoin')
// ->middleware('isLogin')
// ->name('is.join.user');
// Route::get('delete-join-user/{id}','App\Http\Controllers\JoinUserController@deleteUserJoin')
// ->middleware('isLogin')
// ->name('delete.join.user');

// //profile
// Route::get('profile','App\Http\Controllers\ProfileController@isProfile')
// ->middleware('isLogin')
// ->name('profile.get');
// Route::post('updateprofile','App\Http\Controllers\ProfileController@updateProfile')
// ->middleware('isLogin')
// ->name('profile.post');
// Route::post('change-password','App\Http\Controllers\ProfileController@changePassword')
// ->middleware('isLogin','ConfigchangeMiddle')
// ->name('change.pass.post');
