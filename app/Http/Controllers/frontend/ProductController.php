<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index() {
        $product = Products::where('trangthai', 1)->get();
        $danhmuc = Category::where('trangthai', 1)->get();
        $viewData = [
            'product' => $product,
            'danhmuc' => $danhmuc,
        ];
        return view('templates.clients.product.index', $viewData);
    }
    public function detail($slug) {
        if ($slug) {
            $product = Products::where('slug', $slug)->first();
            if($product){
                $related = Products::where('id_danhmuc', $product->id_danhmuc)->get();
            }
            $viewData = [
                'product' => $product,
                'related' => $related
            ];
        }
        return view('templates.clients.product.detail', $viewData);
    }
}
