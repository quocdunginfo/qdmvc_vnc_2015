<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
//import libraries
Qdmvc::loadPageView('contact');
class Qdmvc_View_Shop_Card extends Qdmvc_View_Contact_Card {
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions(); // TODO: Change the autogenerated stub
        $obj['btn_view_in_frontend']['label'] = array(
            'vi-VN' => 'Mở trang Shop',
            'en-US' => 'Open Front-End Shop Page'
        );
        return $obj;
    }

}