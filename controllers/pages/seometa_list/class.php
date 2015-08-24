<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_SEOMeta_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_SEOMeta_List';
    }

    public static function getPage()
    {
        return 'seometa_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'model' => array(
                    'Order' => 20,
                ),
                'model_id' => array(
                    'Order' => 30,
                ),
                'active' => array(
                    'Order' => 40,
                ),
                'overwrite' => array(
                    'Order' => 50,
                ),
                'meta_name' => array(
                    'Order' => 60,
                ),
                'meta_value' => array(
                    'Order' => 70,
                ),
            ));
    }

}
