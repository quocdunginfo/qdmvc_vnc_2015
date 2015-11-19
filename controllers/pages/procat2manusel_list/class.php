<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Procat2ManuSel_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Procat2ManuSel_List';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'productcat_id' => array(
                    'Order' => 20,
                    'Width' => 100
                ),
                '_productcat_name' => array(
                    'Order' => 40,
                    'Width' => 200,
                ),
                'manufactor_id' => array(
                    'Order' => 60,
                    'Width' => 200,
                ),
                '_manufactor_name' => array(
                    'Order' => 80,
                    'Width' => 200,
                ),
            )
        );
    }

    public static function getPage()
    {
        return 'procat2manusel_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'selection' => true
        );
    }

}
