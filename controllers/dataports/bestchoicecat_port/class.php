<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 20/03/2015
 * Time: 10:03 PM
 */
Qdmvc::loadDataPort('postcat_port');
class Qdmvc_DataPort_BestChoiceCat extends Qdmvc_DataPort_PostCat
{
    protected static $model = 'QdBestChoiceCat';
}