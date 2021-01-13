<?php

namespace Modules\Owner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Motel;
use App\Models\LikeList;
use App\Models\Report;
use App\Models\Image;
use App\Models\Review;
use App\Models\Owner;
use App\Models\Notification;
use App\Models\AdminNotification;
use App\Models\MoreExtend;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Modules\Owner\Http\Requests\PostRequest;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('owner::index');
    }

    public function listMotel()
    {
        $motels = Motel::paginate(5);

        return view('owner::list_motel', ['motels' => $motels]);
    }

    public function detailMotel($id)
    {
        $motel = Motel::findOrFail($id);

        return view('owner::detail_motel', ['motel' => $motel]);
    }

    public function likes($id) {
        $check = LikeList::get()->where('motel_id', $id)->where('owner_id', Auth::user()->id);
        if(count($check) == 0){
            LikeList::create(['motel_id' => $id, 'owner_id' => Auth::user()->id]);
        }
    }

    public function dislikes($id) {
        LikeList::find($id)->delete();
    }

    public function likeLists() {
        $likelists = LikeList::paginate(5);
        $user = Auth::user();

        return view('owner::list_like', ['user' => $user, 'likelists' => $likelists]);
    }

    public function report(Request $request, $id) {
        Report::create(['report' => $request->report, 'motel_id' => $id, 'owner_id' => Auth::user()->id]);

        return redirect()->back()->with(['status' => 'Báo cáo vi phạm thành công']);
    }

    public function formPost() {
        return view('owner::post_motel', ['user' => Auth::user()]);
    }

    public function postMotel(PostRequest $request) {
        $datas = $request->only('location', 'price', 'acreage', 'infrastructure', 'title', 'hot_cold', 'air_conditioning', 'bathroom', 'extend');
        $datas['owner_id'] = Auth::user()->id;
        $images = $request->only('image');
        $datas['status'] = 0;
        $posts = Motel::create($datas);
        $images['motel_id'] = $posts->id;
		foreach($images['image'] as $image) {
			$filename = $image->getClientOriginalName();
			Storage::putFileAs('public/images', $image, $filename);
			Image::create(['motel_id' => $posts->id, 'image' => $filename]);
        }
        
        return redirect()->route('owner.index')->with(['status' => 'Bài đăng đang chờ phê duyệt']);
    }

    public function review(Request $request, $id) {
        Review::create(['motel_id' => $id, 'owner_id' => Auth::user()->id, 'review' => $request->review]);

        return redirect()->back();
    }
    
    public function formInformation() {
        return view('owner::information', ['user' => Auth::user()]);
    }
    public function myMotel() {
        return view('owner::my_motel', ['user' => Auth::user()]);
    }

    public function formEdit($id) {
        $motel = Motel::find($id);

        return view('owner::form_edit',['motel' => Motel::find($id)]);
    }

    public function editMotel(Request $request, $id) {
        $motel = $request->only('location', 'title', 'price', 'acreage', 'hot_cold', 'bathroom', 'infrastructure', 'air_conditioning');
        Motel::find($id)->update($motel);

        return redirect()->route('owner.my_motel')->with(['status' => 'Chỉnh sửa bài đăng thành công']);
    }

    public function extend(Request $request, $id) {
        // $extend = Motel::find($id);
        // $extend->update(['extend' => $request->extend + $extend->extend]);

        MoreExtend::create(['owner_id' => Auth::user()->id, 'more_extend' => $request->extend, 'motel_id' => $id]);

        return redirect()->back()->with(['status' => 'Gia hạn thành công, chờ phê duyệt']);
    }

    public function updateInformation(Request $request, $id) {
        $datas = $request->only('email', 'full_name', 'password');
        Owner::find($id)->update($datas);
        
        return redirect()->back()->with(['status' => 'Thay đổi thông tin thành công']);
    }

    public function notification() {
        return view('owner::notification', ['user' => Auth::user()]);
    }

    public function isRead($id) {
        Notification::find($id)->update(['is_read' => '0']);
    }

    public function adminNotification($id){
        AdminNotification::create(['notification' => 'Phòng trọ có id là ' .$id .' vừa cập nhật trạng thái', 'is_read' => '1', 'admin_id' => '1']);
    }

    public function extendNotification($id){
        AdminNotification::create(['notification' => 'Chủ trọ có id là ' .$id .' vừa gia hạn thêm thời gian đăng bài', 'is_read' => '1', 'admin_id' => '1']);
    }
}
