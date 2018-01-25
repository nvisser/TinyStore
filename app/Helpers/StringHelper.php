<?php

namespace App\Helpers;
/**
 * Class StringHelper
 * @package App\Helpers
 */
class StringHelper
{
    /**
     * Generate a pseudorandom string
     *
     * @param int $len
     * @return string
     */
    public static function getRandom(int $len = 32): string
    {
        return substr(bin2hex(random_bytes(32)), 0 , $len);
    }
}