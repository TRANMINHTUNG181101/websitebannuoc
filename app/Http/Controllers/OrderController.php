<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use App\Models\Customer;
use App\Models\District;
use App\Models\FeeShip;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\category;
use App\Models\Province;
use App\Models\Sizes;
use App\Models\Ward;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Facade\FlareClient\Http\Response;
use Svg\Tag\Rect;

class OrderController extends Controller
{
    protected $url = 'admin_pages.order.';
    public function index(Request $request)
    {
        $order = Order::WhereNotNull('id');
        if ($request->content) {
            $order->where('hoten', 'like', '%' . $request->content . '%')
                ->orWhere('madh', 'like', '%' . $request->content . '%');
        }
        if ($request->payment && $request->payment != 10) {
            $order->where('trangthaithanhtoan', $request->payment);
        }
        if ($request->status && $request->status != 10) {
            $order->where('trangthai', $request->status);
        }
        $order = $order->orderByDesc('id')->paginate(5);
        $viewData = [
            'order' => $order,
            'query' => $request->query()
        ];
        return view($this->url . 'index', $viewData);
    }

    public function del($id)
    {
        $order = Order::find($id);
        if ($order) {
            if ($order->httt == 2 || $order->httt == 3 || $order->httt == 1) {
                Payment::where('id_donhang', $order->id)->delete();
            }
            OrderDetail::where('id_donhang', $order->id)->delete();
            $order->delete();
        }
        return redirect()->back();
    }

    //lấy chi tiết đơn hàng 
    public function viewDetail($id, Request $request)
    {

        if ($request->ajax()) {
            $order = Order::find($id);
            $orderDetail = OrderDetail::where('id_donhang', $id)->get();
            $html = view($this->url . 'item_order', compact('orderDetail', 'order'))->render();
            return Response(['html' => $html]);
        }
    }

    public function action($action, $id)
    {
        $order = Order::find($id);
        if ($order) {
            switch ($action) {
                case 'receive':
                    $order->trangthai = 1;
                    break;
                case 'process':
                    $order->trangthai = 2;
                    break;

                case 'transport':
                    $order->trangthai = 3;
                    break;
                case 'success':
                    $order->trangthai = 4;
                    break;

                case 'cancel':
                    $order->trangthai = -1;
                    break;
            }
            $order->save();
        }
        return redirect()->back();
    }
    public function actionPayment($action, $id)
    {
        $order = Order::find($id);
        if ($order) {
            switch ($action) {
                case 'process':
                    $order->trangthaithanhtoan = 2;
                    break;
                case 'success':
                    $order->trangthaithanhtoan = 1;
                    break;
            }
            $order->save();
        }

        return redirect()->back();
    }

    //cập nhật đơn hàng 
    public function update($madh)
    {
        $order = Order::where('madh', $madh)->first();
        if ($order) {
            $orderDetail = OrderDetail::where('id_donhang', $order->id)->paginate(5);
            $payment = Payment::where('id_donhang', $order->id)->first();
            $viewData = [
                'order' => $order,
                'orderDetail' => $orderDetail,
                'payment' => $payment

            ];
            return view($this->url . 'edit', $viewData);
        }
    }

    public function print_order($madh)
    {
        $order = Order::where('madh', $madh)->first();
        if ($order) {
            $orderDetail = OrderDetail::where('id_donhang', $order->id)->get();
            $viewData = [
                'order' => $order,
                'orderDetail' => $orderDetail
            ];
            $file = $order->madh . '.pdf';
            $pdf = PDF::loadView($this->url . 'pdf', $viewData);
            return $pdf->stream($file);
        }
    }

    public function dels(Request $request)
    {
        $list = $request->checkdel;
        if ($list) {
            foreach ($list as $value) {
                $order = Order::find($value);
                if ($order) {
                    if ($order->httt == 2 || $order->httt == 3 || $order->httt == 1) {
                        Payment::where('id_donhang', $order->id)->delete();
                    }
                    OrderDetail::where('id_donhang', $order->id)->delete();
                    $order->delete();
                }
            }
        }
        return redirect()->back();
    }

    public function createOrder()
    {
        $pro = Province::all();
        $pro = FeeShip::whereNotNull('province_id')->get();
        $product = Products::where('trangthai', 1)->orderBy('id_loaisanpham')->get();
        $category = Category::where('trangthai', 1)->get();
        foreach ($product as $value) {
            $product->size = $value->size;
            $product->danhmuc = $value->danhmuc;
        }
        return view($this->url . 'create', ['province' => $pro, 'product'  => ($product), 'category'  => $category]);
    }

    public function getCustomer()
    {
        $customer = Customer::where('trangthai', 1)->get();
        return response()->json(['customer' => $customer]);
    }

    public function createcart(Request $request)
    {
        $inputData = $request->value;
        foreach ($inputData as $value) {
            $product = Products::find((int)$value['idProduct']);
            $discount = 0;
            if (count($product->Coupon) > 0) {
                if ($product->Coupon[0]->loaigiam === 1) {
                    $discount = $product->giaban *  $product->Coupon[0]->giamgia / 100;
                } else {
                    $discount = $product->Coupon[0]->giamgia;
                }
            }
            $product->giagoc = $product->giaban;
            $product->giaban = ($product->giaban - $discount < 0) ? 0 : $product->giaban - $discount;
            foreach ($value['listSize'] as $idSize) {
                if ($idSize) {
                    $size = Sizes::find((int)$idSize);
                    if ($product != null) {
                        $oldCart = Session('cartAD') ? Session('cartAD') : null;
                        $newCart = new Cart($oldCart);
                        $idCart = $product->id;
                        if ($oldCart) {
                            $idCart = $newCart->checkCartProduct($product->id, (int)$idSize, $oldCart);
                        }
                        $newCart->addCart($product, $idCart, 1, $size);
                        $request->session()->put('cartAD', $newCart);
                    }
                }
            }
        }

        $html = view('admin_pages.order.itemCart')->render();
        return  Response()->json(['html' => $html]);
    }

    public function deleteCartAd(Request $request)
    {
        $keyCart = $request->keyCart;
        $oldCart = Session('cartAD') ? Session('cartAD') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteCart($keyCart);
        if (count($newCart->products) > 0) {
            $request->session()->put('cartAD', $newCart);
        } else {
            $request->session()->forget('cartAD');
        }
        $html = view('admin_pages.order.itemCart')->render();
        return  Response()->json(['html' => $html]);
    }

    public function saveOrderAd(Request $request)
    {
        dd($request->all());
    }
}