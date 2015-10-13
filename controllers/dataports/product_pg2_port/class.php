<?php
Qdmvc::loadDataPort('product_port');

class Qdmvc_DataPort_Product_PG2 extends Qdmvc_DataPort_Product
{
    protected static $model = 'QdProductPG2';
}