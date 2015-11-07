<?php
Qdmvc::loadDataPort('product_pg2_port');

class Qdmvc_DataPort_ProductDOHIEU extends Qdmvc_DataPort_Product_PG2
{
    protected static $model = 'QdProductDOHIEU';
}