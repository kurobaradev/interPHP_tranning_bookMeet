<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $users = User::with('getDepartment')->get();

        return view('admin.pages.user.index', compact('users'));
    }

    public function ban($id)
    {
        $user = User::find($id)->get();
            try {
                // tìm đến phòng có id của phòng cần xóa
                User::find($id)->update(
                    [
                        'status' => 1,
                    ]
                );
                // trả về dữ liệu dạng json và thông báo ra màn hình
                session()->flash('success', 'Cập nhật thành công !.');
                return redirect(route('users.index'));
            } catch (\Exception $exception) {
                Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
            }


    }
    public function unban($id)
    {
        try {
            // tìm đến phòng có id của phòng cần xóa
            User::find($id)->update(
                [
                    'status' => 0,
                ]
            );
            // trả về dữ liệu dạng json và thông báo ra màn hình
            session()->flash('success', 'Cập nhật thành công !.');
            return redirect(route('users.index'));
        } catch (\Exception $exception) {
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());

        }
    }


}
