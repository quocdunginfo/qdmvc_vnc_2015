<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadPageView('image');

class Qdmvc_View_ImageUnused extends Qdmvc_View_Image
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_get_unused' => array(
                'fn_name' => 'fn_get_unused',
                'label' => array(
                    'vi-VN' => 'Lọc hình rác',
                    'en-US' => 'Get Unused Image'
                )
            ),
        ));
        return $obj;
    }
}