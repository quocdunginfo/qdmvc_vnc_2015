<?php
Qdmvc::loadDataPort('product_cat_pg2_xe_port');

class Qdmvc_DataPort_ProductCatXEMAY extends Qdmvc_DataPort_ProductCatPG2XE
{
    protected static $model = 'QdProductCatXEMAY';
}