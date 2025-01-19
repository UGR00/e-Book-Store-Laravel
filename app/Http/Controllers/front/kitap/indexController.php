<?php

namespace App\Http\Controllers\front\kitap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kitaplar;

class indexController extends Controller
{
    public function index($selflink)
    {
    $c=kitaplar::where('selflink','=',$selflink)->count();
    if($c!=0)
    {
        $w=kitaplar::where('selflink','=',$selflink)->get();
        return view('front.kitap.index',['data'=>$w]);
    }
    else
    {
        return redirect('/');
    }
    }
}
