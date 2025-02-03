<?php

namespace App\Helper;

class MHelper
{
   
    public static function permalink($string)
    {
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');

       
        $string = strtolower(str_replace($find, $replace, $string));

      
        $string = preg_replace('/[^a-z0-9\-_\.\+]+/', '-', $string);

       
        $string = trim($string, '-');

        return $string;
    }

  
    public static function largeImage($image)
    {
        $imageExplode = explode('/', $image);
        $filename = end($imageExplode);
        $key = key($imageExplode);
        unset($imageExplode[$key]);
        $implodeImage = implode('/', $imageExplode);

        return $implodeImage . "/large/" . $filename;
    }
}
