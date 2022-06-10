<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStatic;
use App\Http\Requests\SlideRequest;
use App\Models\Image;
use App\Models\StaticSetting;
use Illuminate\Http\Request;

use function Symfony\Component\VarDumper\Dumper\esc;

class AdminController extends Controller
{
    protected $url = 'admin_pages.image.';

    public function getSlide()
    {
        $slide = Image::where('loai', 'slide')->orderBy('vitri')->get();
        $viewData = [
            'slide' => $slide,
            'count' => count($slide)
        ];
        return view($this->url . 'index', $viewData);
    }
    public function addSlide()
    {
        return view($this->url . 'add');
    }

    public function postAddSlide(SlideRequest $request)
    {
        $data['ten'] = $request->ten;
        $data['link'] =  $request->link;
        $data['loai'] = 'slide';
        $data['vitri'] = 1;
        $img = $request->file('hinhanh');
        if ($img) {
            $newImage = rand(1, 9999999) . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/slide', $newImage);
            $data['hinhanh'] = $newImage;
        }
        $data['trangthai'] = 1;
        Image::create($data);
        return Redirect()->back();
    }

    public function editSlide($id)
    {
        $image = Image::find($id);
        $viewData = [
            'image' => $image,
        ];
        return view($this->url . 'edit', $viewData);
    }

    public function postEdit($id, Request $request)
    {
        $request->validate([
            'ten' => 'required',
        ], [
            'ten.required' => "Tên không để trống.",
        ]);
        $slide = Image::find($id);
        $slide->ten = $request->ten;
        $slide->link = $request->link;
        $img = $request->file('hinhanh');
        if ($img) {
            $newImage = rand(1, 9999999) . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/slide', $newImage);
            $slide['hinhanh'] = $newImage;
        }
        $slide->save();
        return redirect()->route('get.slide');
    }

    public function deleteSlide($id)
    {
        $slide = Image::find($id);
        $slide->delete();
        return redirect()->back();
    }

    public function activeSlide($id)
    {
        $slide = Image::find($id);
        $slide->trangthai = +!$slide->trangthai;

        $slide->save();
        return redirect()->route('get.slide');
    }
    public function positionSlide($id, Request $request)
    {
        $slide = Image::find($id);
        $slide->vitri = $request->vitri;
        $slide->save();

        return redirect()->back();
    }

    public function staticWeb()
    {
        $options = StaticSetting::first();
        if ($options) {
            return view('admin_pages.static.index', ['setting' => json_decode($options->options)]);
        } else {
            return view('admin_pages.static.index');
        }
    }
    public function postStatic(RequestStatic $request)
    {
        $setting = (object) array(
            'name' => $request->ten,
            'email' => $request->email,
            'dienthoai' => $request->dienthoai,
            'diachi' => $request->diachi,
            'iframemap' => trim($request->iframemap),
        );
        $options = StaticSetting::first();
        if ($options) {
            $options->update(['options' => json_encode($setting)]);
        } else {
            StaticSetting::create(['options' => json_encode($setting)]);
        }
        return redirect()->back();
    }
}