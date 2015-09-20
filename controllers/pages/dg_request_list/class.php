<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_DgRequest_List extends Qdmvc_Page_Root_List
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_DgRequest_List';
    }

    public static function getPage()
    {
        return 'dg_request_list';
    }

    protected function getCustomPageView()
    {
        return array(
            'status' => array(
                'field' => 'status',
                'value' => QdDgRequest::$STATUS_CLOSE,
                'operator' => 'NOT_EQUAL'
            )
        );
    }


    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'keyword' => array(
                    'Order' => 20,
                ),
                'cat_id' => array(
                    'Order' => 30,
                ),
                'status' => array(
                    'Order' => 40,
                ),
                '__owner_name' => array(
                    'Order' => 60,
                ),
                'date_modified' => array(
                    'Order' => 70,
                ),
            ));
    }

}
