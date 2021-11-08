<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        // $users = $this->user->all();
        // dd($users); 
        return view('admin.pages.user.index', compact('users'));
    }
    public function ban($id)
    {
        $this->user->find($id)->update(
            [
                'status' => 1,
            ]
        );
        // session()->flash('success', 'Cập nhật thành công !.');
        return redirect(route('users.index'));
    }
    public function unban($id)
    {
        $this->user->find($id)->update(
            [
                'status' => 0,
            ]
        );
        // session()->flash('success', 'Cập nhật thành công !.');
        return redirect(route('users.index'));
    }
}
