<?php

namespace App\Http\Controllers;

use App\Models\ManagerMaterialUse;
use App\Models\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

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
        return redirect()->back();
        // $managerM = ManagerMaterialUse::all();
        // $nameM = Materials::all();
        // return view('admin_pages.managerMaterialUse.index', compact('managerM', 'nameM'));
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
        $newmmu->slug_name_mal = $slug_name;
        $newmmu->so_luong = $request->quantymmu;
        $timenow = Carbon::now('asia/Ho_Chi_Minh')->toDateString();
        $newmmu->ngay_tong_ket = $timenow;
        $getmmu = Materials::where('slug', $slug_name)->first();
        $newmmu->don_gia = $getmmu->gia_nhap;
        // echo $getmmu->gia_nhap;
        if ($getmmu->gia_nhap == null) {
            session()->put('errors_add', 'nguyên liệu không tồn tại');
            return view('admin_pages.managerMaterialUse.add');
        }
        $newmmu->save();
        $managerM = ManagerMaterialUse::paginate(20);
        $nameM = Materials::all();
        return view('admin_pages.managerMaterialUse.index', compact('managerM', 'nameM'));
    }

    //edit
    public function edit($slug_name_mal)
    {
        $getmmu = ManagerMaterialUse::where('slug_name_mal', $slug_name_mal)->first();
        $getnameMal = Materials::where('slug', $getmmu->slug_name_mal)->first();
        $namemal = $getnameMal->ten_nglieu;
        return view('admin_pages.managerMaterialUse.edit', compact('getmmu', 'namemal'));
    }
    public function update(Request $request)
    {
        $id=$request->id;
        $updatemmu = ManagerMaterialUse::where('id', $id)->first();
        $slug_mal = Str::slug($request->namemmu);
        $updatemmu ->slug_name_mal=$slug_mal;
        $updatemmu->so_luong= $request->quantymmu;
        $getnamemal=Materials::where('slug',$slug_mal)->first();
        if($getnamemal==null){
            session()->put('errors_add', 'nguyên liệu không tồn tại');
            return view('admin_pages.managerMaterialUse.add');
        }
        $updatemmu->save();
        $managerM = ManagerMaterialUse::paginate(20);
        $nameM = Materials::all();
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
