<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 20/03/2015
 * Time: 10:03 PM
 */
Qdmvc::loadDataPort('post_port');

class Qdmvc_DataPort_About extends Qdmvc_DataPort_Post
{
    protected static $model = 'QdAbout';
}