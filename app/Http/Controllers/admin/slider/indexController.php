<?php

namespace App\Http\Controllers\admin\slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Helper\imageUpload;

class indexController extends Controller
{
    public function index()
    {
         $data=Slider::paginate(10);
         return view('admin.slider.index',['data'=>$data,]);
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(Request $request)
    {
        $all['image']=imageUpload::singleUpload(rand(1,9000),"slider",$request->file('image'));
        if($all['image']!=""){
       $insert=Slider::create($all);
       if($insert)
       {
         return redirect()->back()->with('status','Slider Eklendi');
       }
       else
       {
        return redirect()->back()->with('status','Slider Eklenemedi');
       }
    }
    else
    {
        return redirect()->back()->with('status','Slider Eklenemedi');
    }
    }
    public function edit ($id)
    {
        $data=Slider::where('id','=',$id)->get();
        return view('admin.slider.edit',['data'=>$data]);
    }
    
    public function update(Request $request)
    {
      $id=$request->route('id');
        $all['image']=imageUpload::singleUploadUpdate(rand(1,9000),"slider",$request->file('image'),$data,"image");
        if($all['image']!=""){
       $insert=Slider::where('id','=',$id)->update($all);
       if($insert)
       {
         return redirect()->back()->with('status','Slider Düzenlendi');
       }
       else
       {
        return redirect()->back()->with('status','Slider Düzenlenemdi');
       }
    }
    else
    {
        return redirect()->back()->with('status','Slider Eklenemedi');
    }
    }

    public function delete ($id)
    {
        $data=Slider::where('id','=',$id)->delete();
        return redirect()->back();
    }

}
