<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 20/03/2015
 * Time: 10:03 PM
 */
Qdmvc::loadDataPort('widgetnav_port');

class Qdmvc_DataPort_Menu extends Qdmvc_DataPort_WidgetNav
{
    protected static $model = 'QdMenu';
}