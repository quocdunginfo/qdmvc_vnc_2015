<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 09/02/2015
 * Time: 10:45 PM
 */
class QdSetupProductSearch extends QdRootSetup
{
    static $table_name = 'mpd_setup_product_search';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'product_per_segment' => array(
                'Caption' => array('en-US' => 'Pro Per Segment', 'vi-VN' => 'Số Lượng SP/1trang'),
            ),
        ));
    }
}