<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class indexController extends Controller
{
     public function index()
     {
        $data=Order::paginate(10);
        return view('admin.order.index',['data'=>$data]);

     }
     public function detail($id)
     {
      $c=Order::where('id','=',$id)->count();
      if($c!=0)
      {
         $w=Order::where('id','=',$id)->get();
         return view('admin.order.detail',['data'=>$w]);
      }
      else
      {
         return redirect('/');
      }
     }

     public function delete($id)
     {
    $c = Order::where('id', '=', $id)->count();
    if ($c != 0) {
        Order::where('id', '=', $id)->delete();
        return redirect()->back();
    } else {
        return redirect('/');
    }
}
}
