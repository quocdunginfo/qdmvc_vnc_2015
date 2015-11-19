<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');

class Qdmvc_Page_Procat2ManuSel_Card extends Qdmvc_Page_Root
{
    protected static $fields_show = null;

    protected static function initFields()
    {
        return array(
            'General' => array(
                'Type' => 'Group',
                'Fields' => array(
                    'id' => array(
                        'Order' => 20,
                    ),
                    'productcat_id' => array(
                        'Order' => 40,
                    ),
                    '_productcat_name' => array(
                        'Order' => 60,
                    ),
                    'manufactor_id' => array(
                        'Order' => 80,
                    ),
                    '_manufactor_name' => array(
                        'Order' => 100,
                    ),
                )
            )
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Procat2ManuSel_Card';
    }


    public static function getPage()
    {
        return 'procat2manusel';
    }
}