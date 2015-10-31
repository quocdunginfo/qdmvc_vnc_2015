<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadPageView('pbhanh');

class Qdmvc_View_PBHanh_Shipped extends Qdmvc_View_PBHanh
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        //unset($obj['btn_ship']);
        return $obj;
    }
}