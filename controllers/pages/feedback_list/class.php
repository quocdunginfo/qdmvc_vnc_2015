<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:35 PM
 */
Qdmvc::loadPage('root_list');

class Qdmvc_Page_Feedback_List extends Qdmvc_Page_Root_List
{
    public function run()
    {
        parent::run();
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Feedback_List';
    }

    public static function getPage()
    {
        return 'feedback_list';
    }

    protected static function initFields()
    {
        return array_merge(
            parent::initFields(),
            array(
                'customer_name' => array(
                    'Order' => 20,
                ),
                'customer_email' => array(
                    'Order' => 30,
                )
            ));
    }

    protected function getPageView()
    {
        return array(
            'done' => false
        );
    }
}
