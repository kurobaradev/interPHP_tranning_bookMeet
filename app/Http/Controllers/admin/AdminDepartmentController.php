<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminDepartmentController extends Controller
{
    use StorageImageTrait;
    private $department;

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
            DB::beginTransaction();
            $dataDepartmentCreate = [
                'name' => $request->name,
                'address' => $request->address,
            ];
            $dataUploadFeatureImage = $this->StorageImageUpload($request, 'feature_image_path', 'departments');
            if (!empty($dataUploadFeatureImage)) {
                $dataDepartmentCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataDepartmentCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            // dd($dataCarCreate);
            $this->department->create($dataDepartmentCreate);
            DB::commit();
            session()->flash('success', 'tạo thành công !.');

            return redirect(route('departments.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
        }
    }



    public function edit($id)
    {
        $departments = $this->department->find($id);
        return view('admin.pages.department.edit', compact('departments'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataDepartmentUpdate = [
                'name' => $request->name,
                'address' => $request->address,
            ];
            $dataUploadFeatureImage = $this->StorageImageUpload($request, 'feature_image_path', 'department');
            if (!empty($dataUploadFeatureImage)) {
                $dataDepartmentUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataDepartmentUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->department->find($id)->update($dataDepartmentUpdate);

            DB::commit();
            session()->flash('success', 'Cập nhật thành công !.');
            return redirect(route('departments.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
        }

    }
    public function delete($id)
    {
        try {
            $this->department->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
