<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YayinEvi extends Model
{
    use HasFactory;
    protected $guarded =[];
    // protected $fillable=['name','selflink'];
    static function getField($id,$field)
    {
       $c=YayinEvi::where('id','=',$id)->count();
       if($c!=0)
       {
        $w=YayinEvi::where('id','=',$id)->get();
           return $w[0][$field];

       }
       else
       {
        return 'Silinmiş YayınEvi';
       }

    }

}
