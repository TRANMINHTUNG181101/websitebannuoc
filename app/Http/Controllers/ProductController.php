<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\SizePros;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        # code...
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
            $name_file_upload = $images->getClientOriginalName();
            $imageName = $name_file_upload . '_' . time() . '.' . $images->extension();
            $images->move(public_path('uploads/products'), $imageName);
        }

        $newPro = new Products();
        $newPro->ten_san_pham = $req->ProductName;
        $newPro->gia_ban = $req->SellPrice;
        $newPro->hinh_anh = $imageName;
        $newPro->save();

        $getPro = Products::all()->sortByDesc('id')->first();
        $idProLast = $getPro->id;
        $choose = $req->sizePro;
        foreach ($choose as $ch) {
            $newSizePro=new SizePros();
            $newSizePro->id_pro=$idProLast;
            $newSizePro->id_size=$ch;
            $newSizePro->save();
        }
        return redirect('admin/san-pham');
    }





    
}
