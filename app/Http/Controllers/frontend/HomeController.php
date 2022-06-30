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
use App\Models\Visitors;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        $this->showVisitors();

        $product = Products::where('trangthai', 1)->get();

        //sản phẩm mới 
        $productnew = Products::where('trangthai', 1)
            ->orderBy('id')

            ->limit(6)
            ->get()
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

        //banner 
        $banner = Image::where('trangthai', 1)
            ->where('loai', 'bannerHome')
            ->first();
        $viewData = [
            'product' => $product,
            'danhmuc' => $danhmuc,
            'productnew' => $productnew,
            'baiviet' => $posts,
            'promotion' => $stack,
            'slide' => $slide,
            'banner' => $banner,
        ];
        return view('templates.clients.home.index', $viewData);
    }
    public function quickView(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $product = Products::find($id);
            return view('templates.clients.home.quickview', ['product' => $product]);
        }
    }

    public function register()
    {
        return view('templates.clients.home.register');
    }

    //insert ip visitor
    public function showVisitors()
    {

        $user_ip_address = $this->getUserIpAddr();
        //current user online
        // $visitors_current = Visitors::where('ip_address', $user_ip_address)->get();
        // $visitors_count = $visitors_current->count();
        // if ($visitors_count < 1) {
        $visitor = new Visitors();
        $visitor->ip_address = $user_ip_address;
        $visitor->date_visitor = Carbon::now('asia/Ho_Chi_Minh')->toDateString();
        $visitor->save();
        // }
    }

    public function getUserIpAddr()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
