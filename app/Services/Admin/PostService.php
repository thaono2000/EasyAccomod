<?php
namespace App\Services\Admin;

use App\Models\Motel;
use App\Models\Image;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function successListPost() {
    	$posts = Motel::where('status','=','1')->paginate(8);

    	return $posts;
    }

    public function waitListPost() {
    	$posts = Motel::where('status','=','0')->paginate(8);

    	return $posts;
	}
	
	public function refuseListPost() {
    	$posts = Motel::where('status','=','2')->paginate(8);

    	return $posts;
    }

    public function addPost($datas) {
		$datas['status'] = 1;
		$datas['admin_id'] = Auth::user()->id;

    	return  Motel::create($datas);
	}
	
	public function addImage($posts, $images) {
		$images['motel_id'] = $posts->id;
		foreach($images['image'] as $image) {
			$filename = $image->getClientOriginalName();
			Storage::putFileAs('public/images', $image, $filename);
			Image::create(['motel_id' => $posts->id, 'image' => $filename]);			
		}
	}

	public function approvalPost($id) {
		$motel = Motel::find($id);
		$motel->update(['status' => '1', 'now' => 'Chưa cho thuê', 'created_at' => date('Y-m-d')]);
		Notification::create(['notification' => 'Bài đăng của bạn sẽ được hiển thị trong: ' .$motel->extend,
							'is_read' => '1', 'owner_id' => $motel->owner_id, 'status' => '1'
							]);
	}

	public function refusePost($id) {
		$motel = Motel::find($id);
		$motel->update(['status' => '2']);
		Notification::create(['notification' => 'Bài đăng của bạn đã bị từ chối ',
							'is_read' => '1', 'owner_id' => $motel->owner_id, 'status' => 0
							]);
	}

	public function getPost($id) {
		return Motel::findOrFail($id);
	}

	public function editPost($datas, $id) {
		return Motel::findOrFail($id)->update($datas);
	}

}
