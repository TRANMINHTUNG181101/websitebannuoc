<?php

namespace App\Http\Controllers;

use App\Models\ManagerMaterialUse;
use App\Models\Materials;
use Illuminate\Http\Request;

class ManagerMaterialUseController extends Controller
{
    public function index()
    {
        $managerM = ManagerMaterialUse::all();
        $nameM = Materials::all();
        return view('admin_pages.managerMaterialUse.index', compact('managerM', 'nameM'));
    }

    public function sortMalByDay(Request $req)
    {
        $date = date_create($req->daySort);
        $date_f = date_format($date, "Y-d-m");
        $getData = ManagerMaterialUse::where('ngay_tong_ket', $date_f)->get();
        if (count($getData) > 0) {
            return response()->json([
                'dataget' => $getData,
                'flagerror' => 0
            ]);
        }
        return response()->json([
            'dataget' => $getData,
            'flagerror' => 1
        ]);
    }
    public function delMMU($id)
    {
        $getRecord = ManagerMaterialUse::where('id', $id)->get();
        if ($getRecord == null) {
            $getRecord->delete();
            return redirect()->back();
        }
        return "loi xoa du lieu";
    }
    ///add new
    function add(Request $req)
    {
    }
    function viewadd()
    {
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
