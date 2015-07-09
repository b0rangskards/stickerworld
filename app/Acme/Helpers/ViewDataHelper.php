<?php  namespace Acme\Helpers; 

class ViewDataHelper {

    /**
     * @param $headerTitle
     * @param $subTitle
     * @param $currentPage
     * @param null $icon
     * @return mixed
     */
    public static function createViewHeaderData($headerTitle, $subTitle, $currentPage, $icon = null)
    {
        $data['headerTitle'] = $headerTitle;
        $data['subTitle'] = $subTitle;
        $data['currentPage'] = $currentPage;
        $data['icon'] = $icon;

        return $data;
    }

} 