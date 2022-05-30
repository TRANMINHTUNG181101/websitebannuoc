<?php

namespace App\Http\Controllers;

use App\Models\FeeShip;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

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
            $pdf = PDF::loadView($this->url . 'pdf', $viewData);
            return $pdf->stream();
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
}