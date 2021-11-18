<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Models\Room;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{

    use StorageImageTrait;
    public $room;

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
    public function store(StoreRoomRequest $request)
    {
        try {
            // khởi tạo dữ liệu
            $dataRoomCreate = [
                'name' => $request->name,
                'size' => $request->size,
                'address' => $request->address
            ];
            $dataUploadImage = $this->storageImageUpload($request, 'feature_image_path', 'rooms');
            if (!empty($dataUploadImage)) {
                $dataRoomCreate['feature_image_name'] = $dataUploadImage['file_name'];
                $dataRoomCreate['feature_image_path'] = $dataUploadImage['file_path'];
            }
            // dd($dataRoomMeetCreate);
            // tạo dữ liệu
            $this->room->create($dataRoomCreate);

            session()->flash('success', 'tạo thành công !.');
            return redirect(route('rooms.index'));
        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }

    // điều hướng sang trang chỉnh sửa
    public function edit($idRoom)
    {
        // tìm phòng trùng với giá trị id truyền vào
        $room = $this->room->find($idRoom);
        // dd($room);
        return view('admin.pages.room.edit', compact('room'));
    }

    // khởi tạo cập nhật chỉnh sửa
    public function update(Request $request, $idRoom)
    {
        try {
            // khởi tạo dữ liệu
            $dataRoomUpdate = [
                'name' => $request->name,
                'size' => $request->size,
                'address' => $request->address,
                'status' => 0,
            ];
            $dataUploadImage = $this->storageImageUpload($request, 'feature_image_path', 'roomst');
            if (!empty($dataUploadImage)) {
                $dataRoomUpdate['feature_image_name'] = $dataUploadImage['file_name'];
                $dataRoomUpdate['feature_image_path'] = $dataUploadImage['file_path'];
            }
            // dd($data_room_meet_update);
            // tìm phòng có id và bắt đầu cập nhật
            $this->room->find($idRoom)->update($dataRoomUpdate);
            session()->flash('success', 'Cập nhật thành công !.');
            return redirect(route('rooms.index'));
        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }

    // xóa dữ liệu
    public function delete($idRoom)
    {
        try {
            // tìm đến phòng có id của phòng cần xóa
            $this->room->find($idRoom)->delete();
            // trả về dữ liệu dạng json và thông báo ra màn hình
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
