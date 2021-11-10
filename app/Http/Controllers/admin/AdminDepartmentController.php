<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\User;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminDepartmentController extends Controller
{
    use StorageImageTrait;
    private $departments;

    public function __construct(Departments $departments)
    {
        $this->departments = $departments;
    }
    public function index()
    {
        DB::enableQueryLog();
        $departments = Departments::all();
        // $posts = Departments::find(1)->getUser()->name;
        $query = DB::getQueryLog();

// dd($query);
        // dd($posts);
        return view('admin.pages.department.index', compact('departments'));
    }
    public function create()
    {
        return view('admin.pages.department.add');
    }

    public function store(Request $request)
    {
        // $path = $request->file('feature_image_path')->storeAs('tour');
        try {
            DB::beginTransaction();
            $dataDepartmentCreate = [
                'department_number' => $request->department_number,
                'address' => $request->address,
                'number_size' => $request->description,
            ];
            $dataUploadfeatureImage = $this->StorageImageUpload($request, 'feature_image_path', 'department');
            if (!empty($dataUploadfeatureImage)) {
                $dataDepartmentCreate['feature_image_name'] = $dataUploadfeatureImage['file_name'];
                $dataDepartmentCreate['feature_image_path'] = $dataUploadfeatureImage['file_path'];
            }
            // dd($dataCarCreate);
            $this->departments->create($dataDepartmentCreate);
            DB::commit();
            session()->flash('success', 'tạo thành công !.');
            return redirect(route('department.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
        }
    }



    public function edit($id)
    {
        $departments = $this->departments->find($id);
        return view('admin.pages.department.edit', compact('departments'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataDepartmentUpdate = [
                'department_number' => $request->department_number,
                'address' => $request->address,
                'number_size' => $request->description,
            ];
            $dataUploadfeatureImage = $this->StorageImageUpload($request, 'feature_image_path', 'department');
            if (!empty($dataUploadfeatureImage)) {
                $dataDepartmentUpdate['feature_image_name'] = $dataUploadfeatureImage['file_name'];
                $dataDepartmentUpdate['feature_image_path'] = $dataUploadfeatureImage['file_path'];
            }

            $this->departments->find($id)->update($dataDepartmentUpdate);
            $departments = $this->departments->find($id);
            DB::commit();
            session()->flash('success', 'Cập nhật thành công !.');
            return redirect(route('department.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        
    }
    public function delete($id)
    {
        try {
            $this->departments->find($id)->delete();
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
