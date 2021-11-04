<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class AdminDepartmentController extends Controller
{
    use StorageImageTrait;
    private $departments;
    private $roomMeets;

    public function __construct(Departments $departments)
    {
        $this->departments = $departments;
    }
    public function index()
    {
        $departments = Departments::all();
        return view('admin.pages.department.index', compact('departments'));
    }
    public function create()
    {
        return view('admin.pages.department.add');

    }
    public function edit($id)
    {
        $departments = $this->departments->find($id);
        return view('admin.pages.department.edit',compact('departments'));

    }
}
 