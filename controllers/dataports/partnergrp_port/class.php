<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 20/03/2015
 * Time: 10:03 PM
 */
Qdmvc::loadDataPort('widgetnavcat_port');
class Qdmvc_DataPort_PartnerGrp extends Qdmvc_DataPort_WidgetNavCat
{
    protected static $model = 'QdPartnerGrp';
}