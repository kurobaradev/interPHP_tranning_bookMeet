<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function profile()
    {

            $users = $this->user
            ->where('id',Auth::user()->id)
            ->with('tickets','department')
            ->get();
            return view('client.profile',compact('users'));

    }
    public function update(Request $request,$id)
    {
       $this->user->find($id)->update($request->all());
       return redirect()->back()->with('success', 'Cập nhật thành công!');

    }
}
