<?php

namespace App\Http\Controllers\front\cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\kitaplar;

class indexController extends Controller
{
    public function index($selflink)
    {
      $c=Kategoriler::where('selflink','=',$selflink)->count();
         if($c!=0)
         {
            $w=Kategoriler::where('selflink','=',$selflink)->get();
            $data=kitaplar::where('kategoriid','=',$w[0]['id'])->paginate(10);
            return view('front.cat.index',['info'=>$w,'data'=>$data]);
         }
         else
         {
            return redirect('/');
         }
    }
}
