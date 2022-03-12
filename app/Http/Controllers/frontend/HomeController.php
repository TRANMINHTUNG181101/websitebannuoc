<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $product = Products::where('trangthai', 1)->get();

        //sản phẩm mới 
        $productnew = Products::where('trangthai', 1)
                                ->orderBy('id')
                                ->limit(6)
                                ->get();
        $danhmuc = Category::where('trangthai', 1)->get();

        //bài viết 
        $posts = Posts::where('trangthai', 1)
                                ->orderBy('id')
                                ->limit(4)
                                ->get();
        $viewData = [
            'product' => $product,
            'danhmuc' => $danhmuc,
            'productnew' => $productnew,
            'baiviet' => $posts
        ];
        return view('templates.clients.home.index', $viewData);
    }
    public function quickView(Request $request) {
        $id = $request->id;
        if($id) {
            $product = Products::find($id);
            return view('templates.clients.home.quickview',['product' => $product]);
        }
    }

    public function register() {
        return view('templates.clients.home.register');
    }
}
