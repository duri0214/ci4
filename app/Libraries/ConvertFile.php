<?php

namespace App\Libraries;

class ConvertFile
{
    public static function sjisToUtf8($fullPath): string
    {
        // text.txt -> .txt
        $ext = substr($fullPath, strrpos($fullPath, '.'));
        $newFileName = str_replace($ext, "_utf8$ext", $fullPath);
        
        // get converted file.
        $data = mb_convert_encoding(file_get_contents($fullPath), 'UTF-8', 'SJIS-win');
        
        // open new file, write and close.
        $stream = fopen($newFileName, "w");
        fwrite($stream, $data);
        fclose($stream);
        
        return $newFileName;
    }
}
