<?php
Qdmvc::loadDataPort('product_pg2_xe_port');

class Qdmvc_DataPort_ProductXEHOI extends Qdmvc_DataPort_Product_PG2_XE
{
    protected static $model = 'QdProductXEHOI';
}