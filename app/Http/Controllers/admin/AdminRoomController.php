<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoomController extends Controller
{

    use StorageImageTrait;
    private $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    // hiển thị trang chủ phòng họp
    public function index()
    {
        $rooms = $this->room->all();
        return view('admin.pages.room.index', compact('rooms'));
    }

    // điều hướng sang trang tạo mới phòng họp
    public function create()
    {
        return view('admin.pages.room.add');
    }

    // đẩy dữ liệu lên database
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // khởi tạo dữ liệu
            $dataRoomCreate = [
                'name' => $request->name,
                'size' => $request->size,
                'address' => $request->address
            ];
            $dataUploadFeatureImage = $this->StorageImageUpload($request, 'feature_image_path', 'rooms');
            if (!empty($dataUploadFeatureImage)) {
                $dataRoomCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataRoomCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            // dd($dataRoomMeetCreate);
            // tạo dữ liệu
            $this->room->create($dataRoomCreate);
            DB::commit();
            session()->flash('success', 'tạo thành công !.');
            return redirect(route('room.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
        }
    }

    // điều hướng sang trang chỉnh sửa
    public function edit($id)
    {
        // tìm phòng trùng với giá trị id truyền vào
        $room = $this->room->find($id);
        // dd($room);
        return view('admin.pages.room.edit', compact('room'));
    }

    // khởi tạo cập nhật chỉnh sửa
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // khởi tạo dữ liệu
            $dataRoomUpdate = [
                'name' => $request->name,
                'size' => $request->size,
                'address' => $request->address,
                'status' => 0,
            ];
            $dataUploadFeatureImage = $this->StorageImageUpload($request, 'feature_image_path', 'roomst');
            if (!empty($dataUploadFeatureImage)) {
                $dataRoomUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataRoomUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            // dd($data_room_meet_update);
            // tìm phòng có id và bắt đầu cập nhật
            $this->room->find($id)->update($dataRoomUpdate);
            DB::commit();
            session()->flash('success', 'Cập nhật thành công !.');
            return redirect(route('room.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
        }
    }

    // xóa dữ liệu
    public function delete($id)
    {
        try {
            // tìm đến phòng có id của phòng cần xóa
            $this->room->find($id)->delete();
            // trả về dữ liệu dạng json và thông báo ra màn hình
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
