<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_ImportData extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_import' => array(
                'fn_name' => 'fn_import',
                'label' => array(
                    'vi-VN' => 'Import',
                    'en-US' => 'Import'
                )
            ),

        ));
        return $obj;
    }
}