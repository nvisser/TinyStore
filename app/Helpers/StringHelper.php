<?php

namespace App\Helpers;

class StringHelper
{
    public static function getRandom(int $len = 32): string
    {
        return substr(bin2hex(random_bytes(32)), 0 , $len);
    }
}