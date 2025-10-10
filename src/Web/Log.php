<?php

declare(strict_types = 1);

namespace App\Web;

use SplFileInfo;
use App\DateTime\Obsid;

class Log {
    private static string $path = __DIR__ . '/../../logs/';

    public static function create(
        string $fileName,
    )
    {
        $file = self::$path . $fileName;
        
        if (file_exists($file)) die('Sir the Log File is already created!'); 
        
        $prefix = self::getPrefixCreated();
        file_put_contents(self::$path . $fileName, $prefix);

        die("Created!");
    }

    public static function add(string $fileName, string $content)
    {
        $file = self::$path . $fileName;

        if (file_exists($file) === false) die('Sir the Log File does not exist!'); 

        $prefix = self::getPrefixAdded();

        file_put_contents($file, $prefix . $content, FILE_APPEND);
    }

    private static function getPrefixCreated()
    {
        return "[" . Obsid::getDate() . " " . Obsid::getTime() . "] " . basename($_SERVER["SCRIPT_FILENAME"]) . ": Creates this file.";
    }
    
    
    private static function getPrefixAdded(
    )
    {
        return "\n[" . Obsid::getDate() . " " . Obsid::getTime() . "] " . basename($_SERVER["SCRIPT_FILENAME"]) . ": ";
    }
}