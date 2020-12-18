<?php
namespace App\Services\Admin;

use App\Models\Motel;

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
    	$posts = Motel::create($datas);

    	return $posts;
	}
	
	public function approvalPost($id) {
		return Motel::find($id)->update(['status' => '1']);
	}

	public function refusePost($id) {
		return Motel::find($id)->update(['status' => '2']);
	}

	public function getPost($id) {
		return Motel::findOrFail($id);
	}

	public function editPost($datas, $id) {
		return Motel::findOrFail($id)->update($datas);
	}

}
