<?php

namespace App\Http\Controllers;

use App\Models\ManagerMaterialUse;
use App\Models\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class ManagerMaterialUseController extends Controller
{
    public function index()
    {
        $managerM = ManagerMaterialUse::paginate(20);
        $nameM = Materials::all();
        return view('admin_pages.managerMaterialUse.index', compact('managerM', 'nameM'));
    }

    public function sortMalByDay(Request $req)
    {
        $date = date_create($req->dateSort);
        $date_f = date_format($date, "Y-d-m");
        echo $req->dateSorto;
        // $managerM = ManagerMaterialUse::where('ngay_tong_ket', $req->dateSort);
        // $nameM = Materials::all();
        // return view('admin_pages.managerMaterialUse.index', compact('managerM', 'nameM'));
    }
    public function delMMU($id)
    {
        $getRecord = ManagerMaterialUse::find($id);
        $getRecord->delete();
        session()->put('delete_success', 'xoa thanh cong');
        return redirect()->back();
    }
    ///add new
    public function add()
    {
        return view('admin_pages.managerMaterialUse.add');
    }

    public function create(Request $request)
    {
        $newmmu = new ManagerMaterialUse();
        $slug_name = Str::slug($request->namemmu);
        $newmmu->so_luong = $request->quantymmu;
        $timenow = Carbon::now('asia/Ho_Chi_Minh')->toDateString();
        $newmmu->ngay_tong_ket = $timenow;
        $getmmu = Materials::where('slug', $slug_name)->first();
        $newmmu->don_gia = $getmmu->gia_nhap;
        $newmmu->id_nguyen_lieu = $getmmu->id;
        if ($getmmu->gia_nhap == null) {
            session()->put('errors_add', 'nguyên liệu không tồn tại');
            return view('admin_pages.managerMaterialUse.add');
        } else {
            session()->forget('add_mmu');
            // session()->put("add_mmu", 'Them thanh cong');
            $newmmu->save();
            $managerM = ManagerMaterialUse::paginate(20);
            $nameM = Materials::all();
        }


        return view('admin_pages.managerMaterialUse.index', compact('managerM', 'nameM'));
    }

    //edit
    public function edit($id)
    {
        $getmmu = ManagerMaterialUse::where('id', $id)->first();
        $getnameMal = Materials::where('id', $getmmu->id)->first();
        $namemal = $getnameMal->ten_nglieu;
        return view('admin_pages.managerMaterialUse.edit', compact('getmmu', 'namemal'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $updatemmu = ManagerMaterialUse::where('id', $id)->first();
        $slug_mal = Str::slug($request->namemmu);
        // $updatemmu ->slug_name_mal=$slug_mal;
        $updatemmu->so_luong = $request->quantymmu;
        $getnamemal = Materials::where('id', $id)->first();
        if ($getnamemal == null) {
            session()->put('errors_add', 'nguyên liệu không tồn tại');
            return view('admin_pages.managerMaterialUse.add');
        }
        $updatemmu->save();
        $managerM = ManagerMaterialUse::paginate(20);
        $nameM = Materials::all();
        session()->put('update_success', 'Thanh conng');

        return view('admin_pages.managerMaterialUse.index', compact('managerM', 'nameM'));
    }
    public function turnover(Request $req)
    {
        $tienThu = 0;
        $date = date_create($req->datethongke);
        $date_f = date_format($date, "Y-d-m");
        $getDT = ManagerMaterialUse::where('ngay_tong_ket', $date_f)->get();
        $tienvatlieu = 0;
        foreach ($getDT as $val) {
            $tienvatlieu += $val->so_luong * $val->don_gia;
        }
        return $tienvatlieu;
    }
}
