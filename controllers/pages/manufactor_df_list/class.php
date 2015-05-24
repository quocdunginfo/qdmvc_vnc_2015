<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('manufactor_list');

class Qdmvc_Page_ManufactorDF_List extends Qdmvc_Page_Manufactor_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ManufactorDF_List';
    }

    public static function getPage()
    {
        return 'manufactor_df_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'type' => QdManufactor::$TYPE_MANUFACTOR,
            'type2' => QdManufactor::$TYPE2_MANUFACTOR_DEFAULT,
        );
    }
}
