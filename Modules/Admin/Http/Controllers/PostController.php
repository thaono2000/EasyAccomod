<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Admin\PostService;
use Modules\Admin\Http\Requests\PostRequest;
use App\Models\Owner;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function waitListPost()
    {
        $posts = $this->postService->waitListPost();

        return view('admin::pages.post_wait', ['posts' => $posts]);
    }

    public function successListPost() {
        $posts = $this->postService->successListPost();

        return view('admin::pages.post_success', ['posts' => $posts]);
    }

    public function refuseListPost() {
        $posts = $this->postService->refuseListPost();

        return view('admin::pages.post_refuse', ['posts' => $posts]);
    }

    public function createPost() {
        return view('admin::pages.post_create', ['owners' => Owner::get()]);
    }

    public function addPost(PostRequest $request) {
        $datas = $request->only('location', 'price', 'acreage', 'infrastructure', 'title', 'hot_cold', 'air_conditioning', 'bathroom', 'extend', 'admin_id', 'owner_id');
        $images = $request->only('image');
        $posts = $this->postService->addPost($datas);
        $image = $this->postService->addImage($posts, $images);
        
        return redirect()->route('admin.posts.list_success_post')->with('status', 'Tạo bài đăng thành công!!!');
    }

    public function approvalPost($id) {
        $this->postService->approvalPost($id);
    }

    public function refusePost($id) {
        $this->postService->refusePost($id);
    }

    public function formPost($id) {
        $posts = $this->postService->getPost($id); 

        return view('admin::pages.post_edit', ['posts' => $posts]);
    }

    public function editPost(Request $request, $id) {
        $datas = $request->only('location', 'image', 'price', 'acreage', 'infrastructure');
        $posts = $this->postService->editPost($datas, $id);

        return redirect()->route('admin.posts.list_success_post')->with('status', 'Chỉnh sửa bài đăng thành công!!!');
    }
}
