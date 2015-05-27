<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 09/02/2015
 * Time: 10:45 PM
 */
class QdSetupProductOrder extends QdRootSetup
{
    static $table_name = 'mpd_setup_product_order';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'btn_dathang' => array(),
            'btn_goidathang' => array(),
            'advice_phone' => array(
                'Caption' => array('en-US' => 'Advice Phone', 'vi-VN' => 'SĐT tư vấn'),
            ),
            'support_phone' => array(
                'Caption' => array('en-US' => 'Support Phone', 'vi-VN' => 'SĐT hỗ trợ'),
                'DataType' => 'WYSIWYG'
            ),
        ));
    }
}