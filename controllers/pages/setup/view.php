<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadPageView('root_setup');

class Qdmvc_View_Setup extends Qdmvc_View_RootSetup
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_removecache' => array(
                'fn_name' => 'fn_removecache',
                'label' => array(
                    'vi-VN' => 'Xóa Cache',
                    'en-US' => 'Remove Cache'
                )
            )
        ));
        return $obj;
    }

}