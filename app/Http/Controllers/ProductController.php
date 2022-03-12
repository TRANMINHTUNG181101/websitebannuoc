<?php

namespace App\Http\Controllers;

use App\Models\Order_statisticals;
use App\Models\Products;
use App\Models\Sale_statisticals;
use App\Models\SizePros;
use App\Models\Sizes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Json;

class ProductController extends Controller
{

    public function show()
    {
        $spham = Products::all();
        return view('admin_pages.products.index', compact('spham'));
    }

    public function addProductView()
    {
        $size = Sizes::all();
        return view('admin_pages.products.add', compact('size'));
    }

    public function addProductHandle(Request $req)
    {
        //kiem tra du lieu dau vao
        $validator  = Validator::make($req->all(), [
            'ProductName'  => 'required',
            'SellPrice'      => 'required',
            'ProductImage'     => 'required'
        ]);

        //them hinh anh
        $imageName = "";
        $images = $req->file('ProductImage');
        if ($req->hasFile('ProductImage')) {
            $images = $req->file('ProductImage');
            $imageName =  time() . '.' . $images->extension();
            $images->move(public_path('uploads/products'), $imageName);
        }

        $newPro = new Products();
        $newPro->slug = Str::slug($req->ProductName);
        $newPro->ten_san_pham = $req->ProductName;
        $newPro->gia_ban = $req->SellPrice;
        $newPro->hinh_anh = $imageName;
        $newPro->mo_ta_san_pham = $req->Description;
        $newPro->save();

        $getPro = Products::all()->sortByDesc('id')->first();
        $idProLast = $getPro->id;
        $choose = $req->sizePro;
        foreach ($choose as $ch) {
            $newSizePro = new SizePros();
            $newSizePro->id_pro = $idProLast;
            $newSizePro->id_size = $ch;
            $newSizePro->save();
        }
        return redirect('admin/san-pham');
    }

    public function updateProduct()
    {
    }
    public function editProductView()
    {
        $spham = Products::all();
    }

    public function sendData()
    {
        $nameOrder = DB::select("select ten_san_pham_order,so_luot_dat from order_statisticals");

        $newArrName = array();
        $newArrNum = array();
        for ($i = 0; $i < count($nameOrder); $i++) {
            array_push($newArrName, $nameOrder[$i]->ten_san_pham_order);
            array_push($newArrNum, $nameOrder[$i]->so_luot_dat);
        }
        return response()->json([
            'top_sale_name' => $newArrName,
            'top_sale_num' => $newArrNum,
        ]);
    }
    
}
