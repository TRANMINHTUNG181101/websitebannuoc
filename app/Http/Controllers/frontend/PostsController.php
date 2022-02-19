<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Baiviet;
use App\Models\DMBaiviet;
use App\Models\MenuPosts;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {

        //danh sách bài viết
        $posts = Posts::where('trangthai', 1)->get();

        //danh mục bài viết
        $cate = MenuPosts::where('trangthai', 1)->get();
        $viewData = [
            'posts' => $posts,
            'cate' => $cate
        ];
        return view('templates.clients.posts.index', $viewData);
    }
}
