<?php  namespace Acme\Helpers; 

class StrHelper {

    /**
     * Maintain only one space in between words
     */
    public static function cleanSpacing($str)
    {
        return trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $str)));
    }
} 