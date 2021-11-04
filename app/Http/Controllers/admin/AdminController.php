<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
       
    }
    public function index(){
        if (!Auth::check()) {
            return view('welcome');
        }
        return view('admin.dashboard');
    }
}
