<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }



    public function profile($idUser)
    {

        $users = $this->user->where('id', $idUser)->with('tickets', 'department')->get();
        // dd( $users);
            return view('client.profile', compact('users'));
    }
    public function update(Request $request, $idUser)
    {
        $this->user->find($idUser)->update($request->all());
        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }
}
