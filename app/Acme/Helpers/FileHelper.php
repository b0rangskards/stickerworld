<?php  namespace Acme\Helpers; 

class FileHelper {

    /**
     * @param $firstname
     * @param $lastname
     * @param $file
     * @return string
     */
    public static function createEmployeePictureFileName($firstname, $lastname, $file)
    {
        return time() . '_' . strtolower($lastname) . '_' . strtolower($firstname) . '.' . $file->getClientOriginalExtension();
    }

} 