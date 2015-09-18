<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('dg_request_list');

class Qdmvc_Page_DgRequestClose_List extends Qdmvc_Page_DgRequest_List
{
    protected function getCustomPageView()
    {
        return array(
            'status' => array(
                'field' => 'status',
                'value' => QdDgRequest::$STATUS_CLOSE,
                'operator' => 'EQUAL'
            )
        );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_DgRequestClose_List';
    }

    public static function getPage()
    {
        return 'dg_request_close_list';
    }

}
