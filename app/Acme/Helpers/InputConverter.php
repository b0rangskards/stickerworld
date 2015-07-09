<?php  namespace Acme\Helpers; 

use Carbon\Carbon;

class InputConverter {

    public static function getDateFromDatePicker($date, $format = 'Y-m-d')
    {
        return self::convertDateWithFormat($date, $format);
    }

    public static function convertDateWithFormat($date, $format)
    {
        return Carbon::createFromFormat($format, $date)->toDateString();
    }

} 