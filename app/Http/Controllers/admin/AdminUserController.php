<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {

        $users = $this->user->with('department')->get();

        return view('admin.pages.user.index', compact('users'));
    }

    public function ban($idUser)
    {
        try {
            // tìm đến phòng có idUser của phòng cần xóa
            $this->user->find($idUser)->update(
                [
                    'status' => 1,
                ]
            );
            // trả về dữ liệu dạng json và thông báo ra màn hình
            return redirect()->back()->with('success', 'Đã khóa người dùng!');
        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }
    public function unban($idUser)
    {
        try {
            // tìm đến phòng có idUser của phòng cần xóa
            $this->user->find($idUser)->update(
                [
                    'status' => 0,
                ]
            );
            // trả về dữ liệu dạng json và thông báo ra màn hình
            return redirect()->back()->with('success', 'Đã mở khóa người dùng!');
        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }
}
