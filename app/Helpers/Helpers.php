<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 1/31/2016
 * Time: 2:06 PM
 */
namespace App\Helpers;
class Helpers
{
    public static function idfier($string, $get=False){
        $tiny = new \ZackKitzmiller\Tiny('jqewsxzryt0987654321mnbcJFAOYRZV');
        if($get){
            return $tiny->from($string);
        }
        return $tiny->to($string);

    }
}