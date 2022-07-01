<?php

namespace App\Http\Controllers;

use App\Models\Order_statisticals;
use App\Models\Products;
use App\Models\Sale_statisticals;
use App\Models\SizePros;
use App\Models\Sizes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Json;

class ProductController extends Controller
{

    public function show()
    {
        $spham = Products::where('trangthai', 1)->get();
        return view('admin_pages.products.index', compact('spham'));
    }

    public function addProductView()
    {
        $categories = Categories::all();
        $size = Sizes::all();
        return view('admin_pages.products.add', compact('size', 'categories'));
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
        $imageName = $this->uploadImage($req);
        $newPro = new Products();
        $newPro->slug = Str::slug($req->ProductName);
        $newPro->tensp = $req->ProductName;
        $newPro->giaban = $req->SellPrice;
        $newPro->hinhanh = $imageName;
        $newPro->mota = $req->Description;
        $newPro->id_loaisanpham = $req->select_cat;
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

    public function uploadImage($req)
    {
        $imageName = "";
        $images = $req->file('ProductImage');
        if ($req->hasFile('ProductImage')) {
            $images = $req->file('ProductImage');
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('uploads/product/'), $imageName);
        }
        return $imageName;
    }

    //update product
    public function updateProduct(Request $req)
    {
        $editProduct = Products::find($req->id);
        $editProduct->tensp = $req->ten_spham;
        $editProduct->giaban = $req->giaban;
        $editProduct->mota = $req->mota;
        $editProduct->id_loaisanpham = $req->select_cat;


        if ($req->ProductImage != null) {
            $imageName = $this->uploadImage($req);
        } else {
            $imageName = $req->imageOld;
        }

        $editProduct->hinhanh = $imageName;
        $editProduct->save();
        return redirect('admin/san-pham');

    }

    public function editProductView($slug)
    {
        $catetype = Categories::all();
        $spham = Products::where('slug', $slug)->first();
        return view('admin_pages.products.edit', compact('spham', 'catetype'));
    }

    public function deleteProduct($id)
    {
        $delProduct = Products::find($id);
        $delProduct->trangthai = 0;
        $delProduct->save();
        return redirect('admin/san-pham');
    }
}
