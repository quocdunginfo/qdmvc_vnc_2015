<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');
class Qdmvc_View_ProductCat_Card extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_validate_all_level' => array(
                'fn_name' => 'fn_validate_all_level',
                'label' => array(
                    'vi-VN' => 'Validate lại Level',
                    'en-US' => 'Validate all Level'
                )
            ),

        ));
        return $obj;
    }
}