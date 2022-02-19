<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use App\Models\MaterialUnit;
use DateTime;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function show()
    {
        $nglieu = Materials::all();
        $idlog = Auth::id();
        return view('admin_pages.material.index', compact('nglieu', 'idlog'));
    }

    //add new material
    public function addMaterialView()
    {
        $dv_nglieu = MaterialUnit::all();
        return view('admin_pages.material.add', compact('dv_nglieu'));
    }

    public function addMaterialHandle(Request $req)
    {
        //validate values input from form add
        $req->validate([
            'MaterialName' => 'required|max:255',
            'MaterialImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            'MaterialQuantily' => 'required|integer|min:0',
            'ImportPrice' => 'required|integer|min:0'
        ]);

        //them hinh anh
        $imageName = "";
        $images = $req->file('MaterialImage');
        if ($req->hasFile('MaterialImage')) {
            $images = $req->file('MaterialImage');
            $name_file_upload = $images->getClientOriginalName();
            $imageName = $name_file_upload . '_' . time() . '.' . $images->extension();
            $images->move(public_path('uploads/materials'), $imageName);
        }

        $nglieu = new Materials();
        $nglieu->ten_nglieu = $req->MaterialName;
        $nglieu->gia_nhap = $req->ImportPrice;
        $nglieu->so_luong = $req->MaterialQuantily;

        $timecurr = new DateTime();
        $nglieu->ngay_nhap = $timecurr->getTimestamp();

        //format date to timestamp
        $tam = $req->ExpiredDate;
        $date = new DateTime($tam);
        $nglieu->ngay_het_han = $date->getTimestamp();
        $nglieu->hinh_anh = $imageName;
        $nglieu->don_vi_nglieu = $req->input('select_unit');
        $nglieu->save();
        return redirect('admin/nguyen-lieu');
    }

    //update material
    public function editMaterialView($id)
    {
        $nglieu = Materials::find($id);
        $dv_nglieu = MaterialUnit::all();
        $timeexp = $nglieu->ngay_het_han;
        $timein = $nglieu->ngay_nhap;
        $fm_date_expi = date('Y-m-d', $timeexp);
        $fm_date_in = date('Y-m-d', $timein);
        return view('admin_pages.material.edit', compact('nglieu', 'dv_nglieu', 'fm_date_expi', 'fm_date_in'));
    }

    public function updateMaterial(Request $req)
    {
        $nglieu = Materials::find($req->id);
        $nglieu->ten_nglieu = $req->ten_nglieu;
        $nglieu->gia_nhap = $req->gia_nhap;
        $nglieu->so_luong = $req->so_luong;

        if ($req->hinh_anh_edit != null) {
            $imageName = "";
            $images = $req->file('hinh_anh_edit');
            $name_file_upload = $images->getClientOriginalName();
            $imageName = $name_file_upload . '_' . time() . '.' . $images->extension();
            $images->move(public_path('uploads/materials'), $imageName);
        } else {
            $imageName = $req->imageOld;
        }

        $tam = $req->dateEXP;
        $date = new DateTime($tam);
        $nglieu->ngay_het_han = $date->getTimestamp();
        $tamin = $req->dateIn;
        $date = new DateTime($tamin);
        $nglieu->ngay_nhap = $date->getTimestamp();
        $nglieu->hinh_anh = $imageName;
        $nglieu->don_vi_nglieu = $req->select_unit;
        $nglieu->save();
        return redirect('admin/nguyen-lieu');
    }


    public function searchMaterial(Request $req)
    {
        $keySearch = $req->search;
        $nglieu = Materials::where('ten_nglieu', 'like', '%' . $keySearch . '%')->get();
        return view('admin_pages.material.index', compact('nglieu'));
    }

    //delete material
    public function delMaterial($id)
    {
        $delMaterial = Materials::find($id);
        $image_path = "uploads/materials/" . $delMaterial->hinh_anh;
        $delMaterial->delete();

        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        $checkDel = Materials::find($id);

        if ($checkDel != null) {
            session()->put('error_del_mal', 'xoa nguyen lieu that bai!');
        } else {
            session()->put('success_del_mal', 'xoa nguyen lieu thanh cong!');
        }
        return redirect('admin/nguyen-lieu');
    }
}
