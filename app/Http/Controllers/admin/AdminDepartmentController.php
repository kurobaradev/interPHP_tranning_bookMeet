<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class AdminDepartmentController extends AdminController
{
    use StorageImageTrait;
    public $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }
    public function index()
    {
        $departments = $this->department->with('users')->get();
        return view('admin.pages.department.index', compact('departments'));
    }
    public function create()
    {
        return view('admin.pages.department.add');
    }

    public function store(StoreDepartmentRequest $request)
    {
        try {
            $dataDepartmentCreate = [
                'name' => $request->name,
                'address' => $request->address,
            ];
            $dataUploadImage = $this->storageImageUpload($request, 'feature_image_path', 'departments');
            if (!empty($dataUploadImage)) {
                $dataDepartmentCreate['feature_image_name'] = $dataUploadImage['file_name'];
                $dataDepartmentCreate['feature_image_path'] = $dataUploadImage['file_path'];
            }
            // dd($dataCarCreate);
            $this->department->create($dataDepartmentCreate);

            session()->flash('success', 'tạo thành công !.');

            return redirect(route('departments.index'));
        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }



    public function edit($idDepartment)
    {
        $departments = $this->department->find($idDepartment);
        return view('admin.pages.department.edit', compact('departments'));
    }

    public function update(Request $request, $idDepartment)
    {
        try {
            $dataDepartmentUpdate = [
                'name' => $request->name,
                'address' => $request->address,
            ];
            $dataUploadImage = $this->storageImageUpload($request, 'feature_image_path', 'department');
            if (!empty($dataUploadImage)) {
                $dataDepartmentUpdate['feature_image_name'] = $dataUploadImage['file_name'];
                $dataDepartmentUpdate['feature_image_path'] = $dataUploadImage['file_path'];
            }
            $this->department->find($idDepartment)->update($dataDepartmentUpdate);

            session()->flash('success', 'Cập nhật thành công !.');
            return redirect(route('departments.index'));
        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }
    public function delete($idDepartment)
    {
        try {
            $this->department->find($idDepartment)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
