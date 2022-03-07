<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Baiviet;
use App\Models\Comments;
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

    public function getPosts($slug) {
        $detail = Posts::where('slug', $slug)->firstOrFail();
        $lated = Posts::where('trangthai', 1)
        ->orderBy('created_at')
        ->limit(5)
        ->get();
        $comments = Comments::where('id_baiviet', $detail->id)
        ->where('type', 'post')
        ->get();
        return view('templates.clients.posts.detail',['post' => $detail, 'lated' => $lated, 'comments' => $comments]);
    }
}
