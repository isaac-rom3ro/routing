<?php

declare(strict_types = 1);

namespace App\DateTime;
use DateTime as Date;

class Obsid {
    public static function now() 
    {
        return new Date();
    }

    public static function getDate()
    {
        return new Date()->format('Y-m-d');
    }

    public static function getTime()
    {   
        return new Date()->format('H:m:s');
    }

    public static function new(string $date)
    {
        return new Date($date);
    }
}