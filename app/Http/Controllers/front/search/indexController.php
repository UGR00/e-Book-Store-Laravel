<?php

namespace App\Http\Controllers\front\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kitaplar;

class indexController extends Controller
{
    public function index()
    {
       if(strip_tags($_GET['q'])!="")
       {
              $q=strip_tags($_GET['q']);
              $data=Kitaplar::where('name','like','%'.$q.'%')->paginate(10);
              return view('front.search.index',['data'=>$data]);
       }
       else
       {
        return redirect('/');
       }
    }
}
