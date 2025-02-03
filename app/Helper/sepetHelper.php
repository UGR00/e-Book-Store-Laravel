<?php

namespace App\Helper;

use Illuminate\Support\Facades\Session;

class SepetHelper
{ 
  
    public static function add($id, $fiyat, $image, $name)
    {
        $sepet = Session::get('basket');
        $array = [
            'id' => $id,
            'name' => $name,
            'image' => $image,
            'fiyat' => $fiyat
        ];
        Session::put('basket.' . rand(1, 90000), $array);
    }

  
    public static function remove($id)
    {        
        $s = Session::get('basket');
        Session::forget('basket.' . $id);
    } 

   
    public static function countData()
    {
        return count(Session::get('basket'));
    }
    
    
    public static function allList()
    {
        $x = Session::get('basket');
        return $x;
    }

   
    public static function totalPrice()
    {
        $data = self::allList();
        return collect($data)->sum('fiyat');
    }
}
