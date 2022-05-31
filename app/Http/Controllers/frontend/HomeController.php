<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Posts;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product = Products::where('trangthai', 1)->get();

        //sản phẩm mới 
        $productnew = Products::where('trangthai', 1)
            ->orderBy('id')
            ->limit(8)
            ->get();

        //sản phẩm khuyến mãi
        $promotion = Products::where('trangthai', 1)->get();
        $stack = $promotion->filter(function ($item) {
            return count($item->Coupon) > 0;
        })->values();


        $danhmuc = Category::where('trangthai', 1)->get();

        //bài viết 
        $posts = Posts::where('trangthai', 1)
            ->where('hot', 1)
            ->orderBy('id')
            ->limit(8)
            ->get();


        // slide
        $slide = Image::where('trangthai', 1)
            ->where('loai', 'slide')
            ->orderBy('vitri')
            ->get();

        $viewData = [
            'product' => $product,
            'danhmuc' => $danhmuc,
            'productnew' => $productnew,
            'baiviet' => $posts,
            'promotion' => $stack,
            'slide' => $slide
        ];
        return view('templates.clients.home.index', $viewData);
    }
    public function quickView(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $product = Products::find($id);
            $discount = 0;
            if (count($product->Coupon) > 0) {
                if ($product->Coupon[0]->loaigiam === 1) {
                    $discount = $product->giaban *  $product->Coupon[0]->giamgia / 100;
                } else {
                    $discount = $product->Coupon[0]->giamgia;
                }
            }
            $product->giaban = ($product->giaban - $discount < 0) ? 0 : $product->giaban - $discount;

            return view('templates.clients.home.quickview', ['product' => $product]);
        }
    }

    public function register()
    {
        return view('templates.clients.home.register');
    }

    public function searchOrderResult(Request $request)
    {
        $order = Order::where('madh', $request->keyWord)->first();
        $html = '';
        if ($order) {
            $deatil = OrderDetail::where('id_donhang', $order->id)->get();
            $payment = Payment::where('id_donhang', $order->id)->first();
            $html = view('templates.clients.home.resultSearchOrder', ['order' => $order, 'orderDetail' => $deatil, 'payment' => $payment])->render();
        } else {
            $html = view('templates.clients.home.resultSearchOrder', ['order' => $order])->render();
        }

        return  Response()->json(['resultSearchOrder' => $html]);
    }

    public function searchOrder()
    {
        return view('templates.clients.home.searchOrder');
    }
}