<?php

namespace App\Http\Controllers;

use App\Models\ManagerStaff;
use Illuminate\Http\Request;
use App\Models\User;


class RoleController extends Controller
{
    public function index()
    {
        $getID = auth()->user()->id;
        $getLogin = User::where('id', $getID)->get('page_access');
        $listRoles = "";
        foreach ($getLogin as $g) {
            $listRoles = $g['page_access'];
        }
        $pieces = explode(",", $listRoles);
        $roles = array();
        foreach ($pieces as $p) {
            if ($p == 6) {
                $getStaff = User::all();
                return view('admin_pages.managerpermission.index', compact('getStaff'));
            }
        }
        return view('admin_pages.denyaccess.index');
    }

    public function addview()
    {
        $getID = auth()->user()->id;
        $getLogin = User::where('id', $getID)->get('roles_id');
        $listRoles = "";
        foreach ($getLogin as $g) {
            $listRoles = $g['roles_id'];
        }
        $pieces = explode(",", $listRoles);
        $roles = array();
        foreach ($pieces as $p) {
            if ($p == 4) {
                return view('admin_pages.managerpermission.add');
            }
        }
        return view('admin_pages.denyaccess.index');
    }

    public function addhandle(Request $request)
    {

        $newStaff = new User();
        $newStaff->email = $request->email;
        $newStaff->name_staff = $request->ten;
        $newStaff->password = bcrypt($request->matkhau);
        $newStaff->phone_number = $request->dienthoai;
        $listRole = "";
        foreach ($request->roles as $val) {
            $listRole .= $val . ',';
        }
        $listPage = "";
        foreach ($request->choosepage as $val) {
            $listPage .= $val . ',';
        }
        $newStaff->roles_id = $listRole;
        $newStaff->page_access = $listPage;
        $newStaff->save();
        $getStaff = User::all();
        return view('admin_pages.managerpermission.index', compact('getStaff'));
    }
}
