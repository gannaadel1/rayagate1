<?php

namespace App\Http\Traits\Api;

class MathHelper
{
    public static function sum($price){
        return array_sum($price);
        

    }
}