<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RoomMeets;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoomMeetController extends Controller
{

    use StorageImageTrait;
    private $roomMeets;

    public function __construct(RoomMeets $roomMeets)
    {
        $this->roomMeets = $roomMeets;
    }

    // hiển thị trang chủ phòng họp
    public function index()
    {
        $roomMeets = RoomMeets::all();
        return view('admin.pages.roomMeet.index', compact('roomMeets'));
    }

    // điều hướng sang trang tạo mới phòng họp
    public function create()
    {
        return view('admin.pages.roomMeet.add');
    }

    // đẩy dữ liệu lên database
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // khởi tạo dữ liệu
            $dataRoomMeetCreate = [
                'room_name' => $request->room_name,
                'room_size' => $request->room_size,
                'address' => $request->address
            ];
            $dataUploadFeatureImage = $this->StorageImageUpload($request, 'feature_image_path', 'room_meet');
            if (!empty($dataUploadFeatureImage)) {
                $dataRoomMeetCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataRoomMeetCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            // dd($dataRoomMeetCreate);
            // tạo dữ liệu
            $this->roomMeets->create($dataRoomMeetCreate);
            DB::commit();
            session()->flash('success', 'tạo thành công !.');
            return redirect(route('room-meet.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line' . $exception->getLine());
        }
    }

    // điều hướng sang trang chỉnh sửa
    public function edit($id)
    {
        // tìm phòng trùng với giá trị id truyền vào
        $roomMeets = $this->roomMeets->find($id);
        // dd($roomMeets);
        return view('admin.pages.roomMeet.edit', compact('roomMeets'));
    }

    // khởi tạo cập nhật chỉnh sửa
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // khởi tạo dữ liệu
            $data_room_meet_update = [
                'room_name' => $request->room_name,
                'room_size' => $request->room_size,
                'address' => $request->address,
                'status' => 0,
            ];
            $dataUploadFeatureImage = $this->StorageImageUpload($request, 'feature_image_path', 'room_meet');
            if (!empty($dataUploadFeatureImage)) {
                $data_room_meet_update['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $data_room_meet_update['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            // dd($data_room_meet_update);
            // tìm phòng có id và bắt đầu cập nhật
            $this->roomMeets->find($id)->update($data_room_meet_update);
            DB::commit();
            session()->flash('success', 'Cập nhật thành công !.');
            return redirect(route('room-meet.index'));
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
            $this->roomMeets->find($id)->delete();
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
