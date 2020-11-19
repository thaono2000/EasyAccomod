<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Admin\PostService;

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

    public function createPost() {
        return view('admin::pages.post_create');
    }

    public function addPost(Request $request) {
        $datas = $request->only('location', 'image', 'price', 'acreage', 'infrastructure');
        $posts = $this->postService->addPost($datas);

        return view('admin::pages.home', ['posts' => $posts]);
    }

    public function approvalPost($id) {
        $this->postService->approvalPost($id);
    }
}
